<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Authenticate user strictly by username and issue API bearer token.
     */
    public function login(Request $request): JsonResponse
    {
        $usernameInput = trim($request->input('username') ?? $request->input('email') ?? '');
        $cleanUsername = ltrim(strtolower($usernameInput), '@');
        $password = (string) $request->input('password');

        if (!$cleanUsername || !$password) {
            return response()->json([
                'message' => 'Username and password are required.',
            ], 400);
        }

        $user = User::where('username', $cleanUsername)
            ->orWhere('name', $cleanUsername)
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Invalid login credentials.',
            ], 401);
        }

        if ($user->status === 'Inactive') {
            return response()->json([
                'message' => 'Your account is currently inactive.',
            ], 403);
        }

        $token = $user->createToken('admin-access-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username ?? $cleanUsername,
                'email' => $user->email ?? '',
                'roleId' => $user->role_id ?? 'super_admin',
                'roleName' => $user->role_name ?? 'Super Admin',
                'status' => $user->status ?? 'Active',
            ],
            'token' => $token,
        ]);
    }

    /**
     * Get the authenticated user profile.
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    /**
     * Log out current user (revoke current token).
     */
    public function logout(Request $request): JsonResponse
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
