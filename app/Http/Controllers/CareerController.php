<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CareerController extends Controller
{
    /**
     * Display a listing of all career openings.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Career::orderBy('id', 'asc');

        if ($request->has('status')) {
            $query->where('status', $request->query('status'));
        }

        $careers = $query->get();
        return response()->json($careers);
    }

    /**
     * Display the specified career opening by slug or ID.
     */
    public function show(string $slugOrId): JsonResponse
    {
        $career = Career::where('slug', $slugOrId)
            ->orWhere('id', is_numeric($slugOrId) ? (int)$slugOrId : 0)
            ->first();

        if (!$career) {
            return response()->json(['error' => 'Job offer not found'], 404);
        }

        return response()->json($career);
    }

    /**
     * Store a newly created career opening in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $title = $request->input('title') ?? ($request->input('translations.en.title') ?? 'New Job Opening');
        $slug = $request->input('slug') ?: \Illuminate\Support\Str::slug($title);
        
        // Ensure unique slug
        $count = Career::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        $translations = $request->input('translations') ?: [
            'en' => [
                'title' => $title,
                'department' => $request->input('department') ?? 'Sales',
                'location' => $request->input('location') ?? 'Algiers',
                'experience' => $request->input('experience') ?? '2-4 years',
                'salary' => $request->input('salary') ?? 'Competitive',
                'description' => $request->input('description') ?? '',
            ],
            'ar' => [
                'title' => $title,
                'department' => $request->input('department') ?? 'Sales',
                'location' => $request->input('location') ?? 'Algiers',
                'experience' => $request->input('experience') ?? '2-4 years',
                'salary' => $request->input('salary') ?? 'Competitive',
                'description' => $request->input('description') ?? '',
            ],
            'fr' => [
                'title' => $title,
                'department' => $request->input('department') ?? 'Sales',
                'location' => $request->input('location') ?? 'Algiers',
                'experience' => $request->input('experience') ?? '2-4 years',
                'salary' => $request->input('salary') ?? 'Competitive',
                'description' => $request->input('description') ?? '',
            ],
        ];

        $career = Career::create([
            'slug' => $slug,
            'department' => $request->input('department') ?? 'Sales',
            'location' => $request->input('location') ?? 'Algiers',
            'type' => $request->input('type') ?? 'Full-time',
            'experience' => $request->input('experience') ?? '2-4 years',
            'salary' => $request->input('salary') ?? 'Competitive',
            'status' => $request->input('status') ?? 'Published',
            'translations' => $translations,
        ]);

        return response()->json($career, 201);
    }

    /**
     * Update the specified career opening in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $career = Career::find($id);

        if (!$career) {
            return response()->json(['error' => 'Job offer not found'], 404);
        }

        // Support partial status toggles from index lists
        if ($request->has('status') && count($request->all()) === 1) {
            $career->update(['status' => $request->status]);
            return response()->json($career);
        }

        $title = $request->input('title') ?? ($request->input('translations.en.title') ?? $career->translations['en']['title'] ?? 'Job Opening');
        $slug = $request->input('slug') ?: \Illuminate\Support\Str::slug($title);

        $translations = $request->input('translations') ?: $career->translations ?: [
            'en' => ['title' => $title, 'description' => $request->input('description') ?? ''],
            'ar' => ['title' => $title, 'description' => $request->input('description') ?? ''],
            'fr' => ['title' => $title, 'description' => $request->input('description') ?? ''],
        ];

        $career->update([
            'slug' => $slug,
            'department' => $request->input('department') ?? $career->department,
            'location' => $request->input('location') ?? $career->location,
            'type' => $request->input('type') ?? $career->type,
            'experience' => $request->input('experience') ?? $career->experience,
            'salary' => $request->input('salary') ?? $career->salary,
            'status' => $request->input('status') ?? $career->status,
            'translations' => $translations,
        ]);

        return response()->json($career);
    }

    /**
     * Remove the specified career opening from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $career = Career::find($id);

        if (!$career) {
            return response()->json(['error' => 'Job offer not found'], 404);
        }

        $career->delete();

        return response()->json(['success' => true, 'message' => 'Job offer deleted']);
    }
}
