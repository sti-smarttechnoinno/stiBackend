<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        $id = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $validated['name'])) . '_' . time();

        $role = Role::create([
            'id' => $id,
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'is_system' => false,
            'permissions' => $validated['permissions'] ?? [],
        ]);

        return response()->json($role, 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        $role->update($validated);

        return response()->json($role);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->is_system) {
            return response()->json(['error' => 'System roles cannot be deleted.'], 403);
        }

        $role->delete();

        return response()->json(['success' => true]);
    }
}
