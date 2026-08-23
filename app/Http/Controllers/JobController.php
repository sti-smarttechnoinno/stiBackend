<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    /**
     * Display a listing of all jobs.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Job::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('department')) {
            $query->where('department', $request->department);
        }

        if ($request->has('location')) {
            $query->where('location', $request->location);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $jobs = $query->orderBy('id', 'desc')->get();

        return response()->json($jobs);
    }

    /**
     * Display the specified job by slug or ID.
     */
    public function show(string $slugOrId): JsonResponse
    {
        $job = Job::where('slug', $slugOrId)
            ->orWhere('id', is_numeric($slugOrId) ? (int) $slugOrId : 0)
            ->first();

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        return response()->json($job);
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:job_openings,slug',
            'department' => 'required|string',
            'location' => 'required|string',
            'street_address' => 'nullable|string',
            'address_region' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'type' => 'nullable|string',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'salary' => 'nullable|string',
            'status' => 'nullable|string',
            'translations' => 'nullable|array',
        ]);

        $job = Job::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'department' => $validated['department'],
            'location' => $validated['location'],
            'street_address' => $validated['street_address'] ?? null,
            'address_region' => $validated['address_region'] ?? null,
            'postal_code' => $validated['postal_code'] ?? null,
            'type' => $validated['type'] ?? 'Full-time',
            'experience' => $validated['experience'] ?? null,
            'description' => $validated['description'] ?? null,
            'salary' => $validated['salary'] ?? null,
            'status' => $validated['status'] ?? 'Published',
            'translations' => $validated['translations'] ?? null,
        ]);

        return response()->json($job, 201);
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:job_openings,slug,' . $id,
            'department' => 'required|string',
            'location' => 'required|string',
            'street_address' => 'nullable|string',
            'address_region' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'type' => 'nullable|string',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'salary' => 'nullable|string',
            'status' => 'nullable|string',
            'translations' => 'nullable|array',
        ]);

        $job->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'department' => $validated['department'],
            'location' => $validated['location'],
            'street_address' => $validated['street_address'] ?? $job->street_address,
            'address_region' => $validated['address_region'] ?? $job->address_region,
            'postal_code' => $validated['postal_code'] ?? $job->postal_code,
            'type' => $validated['type'] ?? $job->type,
            'experience' => $validated['experience'] ?? $job->experience,
            'description' => $validated['description'] ?? $job->description,
            'salary' => $validated['salary'] ?? $job->salary,
            'status' => $validated['status'] ?? $job->status,
            'translations' => $validated['translations'] ?? $job->translations,
        ]);

        return response()->json($job);
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        $job->delete();

        return response()->json(['success' => true, 'message' => 'Job deleted']);
    }
}
