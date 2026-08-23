<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class QuoteRequestController extends Controller
{
    public function index(): JsonResponse
    {
        if (!Schema::hasTable('quote_requests')) {
            return response()->json([]);
        }
        $requests = QuoteRequest::orderBy('created_at', 'desc')->get();
        return response()->json($requests);
    }

    public function store(Request $request): JsonResponse
    {
        if (!Schema::hasTable('quote_requests')) {
            return response()->json(['error' => 'Table quote_requests does not exist in database'], 500);
        }

        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'business_type' => 'nullable|string|max:255',
            'products' => 'nullable',
            'volume' => 'nullable|string|max:255',
            'contact_method' => 'nullable|string|max:100',
            'message' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        if (empty($validated['status'])) {
            $validated['status'] = 'Pending';
        }

        if (isset($validated['products']) && is_string($validated['products'])) {
            try {
                $validated['products'] = json_decode($validated['products'], true) ?? [$validated['products']];
            } catch (\Throwable $e) {
                $validated['products'] = [$validated['products']];
            }
        }

        $quoteRequest = QuoteRequest::create($validated);

        return response()->json([
            'success' => true,
            'request' => $quoteRequest,
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        if (!Schema::hasTable('quote_requests')) {
            return response()->json(['error' => 'Table quote_requests does not exist'], 500);
        }

        $quoteRequest = QuoteRequest::find($id);
        if (!$quoteRequest) {
            return response()->json(['error' => 'Quote request not found'], 404);
        }

        $payload = $request->only([
            'status',
            'business_name',
            'contact_person',
            'email',
            'phone',
            'business_type',
            'products',
            'volume',
            'contact_method',
            'message',
        ]);

        $quoteRequest->update(array_filter($payload, function ($val) {
            return $val !== null;
        }));

        return response()->json([
            'success' => true,
            'request' => $quoteRequest,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        if (!Schema::hasTable('quote_requests')) {
            return response()->json(['error' => 'Table quote_requests does not exist'], 500);
        }

        $quoteRequest = QuoteRequest::find($id);
        if ($quoteRequest) {
            $quoteRequest->delete();
        }

        return response()->json(['success' => true]);
    }
}
