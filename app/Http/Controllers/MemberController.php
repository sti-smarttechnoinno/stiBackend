<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return response()->json(Member::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:members,username',
            'email' => 'nullable|string',
            'password' => 'required|string',
            'roleId' => 'nullable|string',
            'roleName' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $member = Member::create([
            'name' => $validated['name'],
            'username' => strtolower($validated['username']),
            'email' => $validated['email'] ?? '',
            'password' => $validated['password'],
            'role_id' => $validated['roleId'] ?? 'viewer',
            'role_name' => $validated['roleName'] ?? 'Viewer',
            'status' => $validated['status'] ?? 'Active',
            'last_login' => 'Never',
        ]);

        return response()->json($member, 201);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'username' => 'sometimes|string|unique:members,username,' . $id,
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
        if (isset($validated['last_login'])) {
            $validated['last_login'] = $validated['last_login'];
        }

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $member->update($validated);

        return response()->json($member);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        if ($member->username === 'admin') {
            return response()->json(['error' => 'Super Admin user cannot be deleted.'], 403);
        }

        $member->delete();

        return response()->json(['success' => true]);
    }
}
