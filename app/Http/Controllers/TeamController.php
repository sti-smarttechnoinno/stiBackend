<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Schema;

class TeamController extends Controller
{
    public function index(): JsonResponse
    {
        if (!Schema::hasTable('team_members')) {
            return response()->json([]);
        }
        $members = TeamMember::orderBy('id', 'asc')->get();
        return response()->json($members);
    }

    public function store(Request $request): JsonResponse
    {
        if (!Schema::hasTable('team_members')) {
            return response()->json(['error' => 'Table team_members does not exist in database'], 500);
        }
        $payload = $request->all();
        $membersData = [];

        if (is_array($payload) && array_is_list($payload)) {
            $membersData = $payload;
        } elseif (isset($payload['members']) && is_array($payload['members'])) {
            $membersData = $payload['members'];
        }

        $savedIds = [];
        foreach ($membersData as $item) {
            $rawId = $item['id'] ?? null;
            $id = is_numeric($rawId) && (float)$rawId < 2147483647 ? (int)$rawId : null;

            $member = $id ? TeamMember::find($id) : null;
            if ($member) {
                $member->update([
                    'name' => $item['name'] ?? '',
                    'position' => $item['position'] ?? '',
                    'initials' => $item['initials'] ?? null,
                    'image' => $item['image'] ?? null,
                    'linkedin' => $item['linkedin'] ?? null,
                    'translations' => $item['translations'] ?? null,
                ]);
            } else {
                $member = TeamMember::create([
                    'name' => $item['name'] ?? '',
                    'position' => $item['position'] ?? '',
                    'initials' => $item['initials'] ?? null,
                    'image' => $item['image'] ?? null,
                    'linkedin' => $item['linkedin'] ?? null,
                    'translations' => $item['translations'] ?? null,
                ]);
            }
            if ($member && $member->id) {
                $savedIds[] = $member->id;
            }
        }

        // Delete any members not included in savedIds
        if (!empty($savedIds)) {
            TeamMember::whereNotIn('id', $savedIds)->delete();
        }

        $all = TeamMember::orderBy('id', 'asc')->get();
        return response()->json($all);
    }
}
