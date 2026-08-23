<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class NewsController extends Controller
{
    public function index(): JsonResponse
    {
        if (!Schema::hasTable('news')) {
            return response()->json([]);
        }
        $articles = News::orderBy('id', 'desc')->get();
        return response()->json($articles);
    }

    public function show($slugOrId): JsonResponse
    {
        if (!Schema::hasTable('news')) {
            return response()->json(['error' => 'Table news does not exist'], 404);
        }

        $article = is_numeric($slugOrId)
            ? News::find($slugOrId)
            : News::where('slug', $slugOrId)->first();

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        return response()->json($article);
    }

    public function store(Request $request): JsonResponse
    {
        if (!Schema::hasTable('news')) {
            return response()->json(['error' => 'Table news does not exist in database'], 500);
        }

        $validated = $request->validate([
            'slug' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'author_bio' => 'nullable|string',
            'published_at' => 'nullable|string|max:255',
            'publishedAt' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:255',
            'readingTime' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'hero_image' => 'nullable|string',
            'heroImage' => 'nullable|string',
            'translations' => 'nullable|array',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'excerpt' => 'nullable|string',
        ]);

        $slug = $validated['slug'] ?? null;
        if (empty($slug)) {
            $title = $request->input('title') ?? $request->input('translations.en.title') ?? 'article';
            $slug = \Illuminate\Support\Str::slug($title) . '-' . time();
        }

        $article = News::create([
            'slug' => $slug,
            'category' => $validated['category'] ?? 'Company News',
            'author' => $validated['author'] ?? 'STI Editorial Team',
            'author_role' => $validated['author_role'] ?? null,
            'author_bio' => $validated['author_bio'] ?? null,
            'published_at' => $validated['published_at'] ?? $validated['publishedAt'] ?? date('Y-m-d'),
            'reading_time' => $validated['reading_time'] ?? $validated['readingTime'] ?? '3 min read',
            'status' => $validated['status'] ?? 'Published',
            'hero_image' => $validated['hero_image'] ?? $validated['heroImage'] ?? '/assets/hero.png',
            'translations' => $validated['translations'] ?? [
                'en' => [
                    'title' => $request->input('title') ?? 'Untitled Article',
                    'excerpt' => $request->input('excerpt') ?? '',
                    'content' => $request->input('content') ?? '',
                    'tags' => [],
                ],
                'ar' => [
                    'title' => $request->input('title') ?? 'Untitled Article',
                    'excerpt' => $request->input('excerpt') ?? '',
                    'content' => $request->input('content') ?? '',
                    'tags' => [],
                ],
                'fr' => [
                    'title' => $request->input('title') ?? 'Untitled Article',
                    'excerpt' => $request->input('excerpt') ?? '',
                    'content' => $request->input('content') ?? '',
                    'tags' => [],
                ],
            ],
        ]);

        return response()->json($article, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        if (!Schema::hasTable('news')) {
            return response()->json(['error' => 'Table news does not exist'], 500);
        }

        $article = News::find($id);
        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        $data = $request->all();

        if (isset($data['heroImage'])) {
            $data['hero_image'] = $data['heroImage'];
            unset($data['heroImage']);
        }
        if (isset($data['publishedAt'])) {
            $data['published_at'] = $data['publishedAt'];
            unset($data['publishedAt']);
        }
        if (isset($data['readingTime'])) {
            $data['reading_time'] = $data['readingTime'];
            unset($data['readingTime']);
        }

        $article->update($data);

        return response()->json($article);
    }

    public function destroy($id): JsonResponse
    {
        if (!Schema::hasTable('news')) {
            return response()->json(['error' => 'Table news does not exist'], 500);
        }

        $article = News::find($id);
        if ($article) {
            $article->delete();
        }

        return response()->json(['success' => true]);
    }
}
