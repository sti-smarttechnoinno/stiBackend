<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class ContactMessageController extends Controller
{
    public function index(): JsonResponse
    {
        if (!Schema::hasTable('contact_messages')) {
            return response()->json([]);
        }
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return response()->json($messages);
    }

    public function store(Request $request): JsonResponse
    {
        if (!Schema::hasTable('contact_messages')) {
            return response()->json(['error' => 'Table contact_messages does not exist in database'], 500);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'nullable|string|max:50',
        ]);

        if (empty($validated['status'])) {
            $validated['status'] = 'Unread';
        }

        $message = ContactMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => $message,
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        if (!Schema::hasTable('contact_messages')) {
            return response()->json(['error' => 'Table contact_messages does not exist'], 500);
        }

        $message = ContactMessage::find($id);
        if (!$message) {
            return response()->json(['error' => 'Message not found'], 404);
        }

        $status = $request->input('status');
        if ($status) {
            $message->update(['status' => $status]);
        }

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        if (!Schema::hasTable('contact_messages')) {
            return response()->json(['error' => 'Table contact_messages does not exist'], 500);
        }

        $message = ContactMessage::find($id);
        if ($message) {
            $message->delete();
        }

        return response()->json(['success' => true]);
    }
}
