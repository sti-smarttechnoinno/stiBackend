<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SolutionController extends Controller
{
    /**
     * Display a listing of all solutions.
     */
    public function index(): JsonResponse
    {
        $solutions = Solution::orderBy('id', 'asc')->get();
        return response()->json($solutions);
    }

    /**
     * Display the specified solution by slug or ID.
     */
    public function show(string $slugOrId): JsonResponse
    {
        $solution = Solution::where('slug', $slugOrId)
            ->orWhere('id', is_numeric($slugOrId) ? (int)$slugOrId : 0)
            ->first();

        if (!$solution) {
            return response()->json(['error' => 'Solution not found'], 444);
        }

        return response()->json($solution);
    }

    /**
     * Store a newly created solution in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:solutions,slug',
            'status' => 'nullable|string',
            'image' => 'nullable|string',
            'translations' => 'required|array',
        ]);

        $solution = Solution::create([
            'slug' => $validated['slug'],
            'status' => $validated['status'] ?? 'Published',
            'image' => $validated['image'] ?? null,
            'translations' => $validated['translations'],
        ]);

        return response()->json($solution, 201);
    }

    /**
     * Update the specified solution in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $solution = Solution::find($id);

        if (!$solution) {
            return response()->json(['error' => 'Solution not found'], 404);
        }

        $validated = $request->validate([
            'slug' => 'required|string|unique:solutions,slug,' . $id,
            'status' => 'nullable|string',
            'image' => 'nullable|string',
            'translations' => 'required|array',
        ]);

        $solution->update([
            'slug' => $validated['slug'],
            'status' => $validated['status'] ?? $solution->status,
            'image' => $validated['image'] ?? $solution->image,
            'translations' => $validated['translations'],
        ]);

        return response()->json($solution);
    }

    /**
     * Remove the specified solution from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $solution = Solution::find($id);

        if (!$solution) {
            return response()->json(['error' => 'Solution not found'], 404);
        }

        $solution->delete();

        return response()->json(['success' => true, 'message' => 'Solution deleted']);
    }
}
