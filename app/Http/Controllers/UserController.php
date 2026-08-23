<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'nullable|string',
            'password' => 'required|string',
            'roleId' => 'nullable|string',
            'roleName' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => strtolower($validated['username']),
            'email' => $validated['email'] ?? '',
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['roleId'] ?? 'viewer',
            'role_name' => $validated['roleName'] ?? 'Viewer',
            'status' => $validated['status'] ?? 'Active',
            'last_login' => 'Never',
        ]);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'username' => 'sometimes|string|unique:users,username,' . $id,
            'email' => 'nullable|string',
            'password' => 'nullable|string',
            'roleId' => 'nullable|string',
            'roleName' => 'nullable|string',
            'status' => 'nullable|string',
            'last_login' => 'nullable|string',
        ]);

        if (isset($validated['roleId'])) {
            $validated['role_id'] = $validated['roleId'];
            unset($validated['roleId']);
        }
        if (isset($validated['roleName'])) {
            $validated['role_name'] = $validated['roleName'];
            unset($validated['roleName']);
        }
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->username === 'admin') {
            return response()->json(['error' => 'Super Admin user cannot be deleted.'], 403);
        }

        $user->delete();

        return response()->json(['success' => true]);
    }
}
