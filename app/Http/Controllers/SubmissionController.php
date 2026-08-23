<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class SubmissionController extends Controller
{
    public function index(): JsonResponse
    {
        if (!Schema::hasTable('submissions')) {
            return response()->json([]);
        }
        $submissions = Submission::orderBy('created_at', 'desc')->get();
        return response()->json($submissions);
    }

    public function store(Request $request): JsonResponse
    {
        if (!Schema::hasTable('submissions')) {
            return response()->json(['error' => 'Table submissions does not exist in database'], 500);
        }

        $validated = $request->validate([
            'candidate_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:100',
            'position' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'portfolio' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'cv_file' => 'nullable|string',
            'cover_file' => 'nullable|string',
            'cert_file' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        if (empty($validated['status'])) {
            $validated['status'] = 'New';
        }

        $submission = Submission::create($validated);

        return response()->json([
            'success' => true,
            'submission' => $submission,
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        if (!Schema::hasTable('submissions')) {
            return response()->json(['error' => 'Table submissions does not exist'], 500);
        }

        $submission = Submission::find($id);
        if (!$submission) {
            return response()->json(['error' => 'Submission not found'], 404);
        }

        $payload = $request->only([
            'status',
            'candidate_name',
            'email',
            'phone',
            'position',
            'city',
            'message',
        ]);

        $submission->update(array_filter($payload, function ($val) {
            return $val !== null;
        }));

        return response()->json([
            'success' => true,
            'submission' => $submission,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        if (!Schema::hasTable('submissions')) {
            return response()->json(['error' => 'Table submissions does not exist'], 500);
        }

        $submission = Submission::find($id);
        if ($submission) {
            $submission->delete();
        }

        return response()->json(['success' => true]);
    }
}
