<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

// Fallback route to serve product images when storage:link symlink is missing (cPanel)
Route::get('/storage/products/{filename}', function (string $filename) {
    // Try public path first (in case file exists there already)
    $publicFile = public_path('storage/products/' . $filename);
    if (file_exists($publicFile)) {
        return response()->file($publicFile, [
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }

    // Try storage/app/public/products/ fallback
    $storagePath = storage_path('app/public/products/' . $filename);
    if (file_exists($storagePath)) {
        return response()->file($storagePath, [
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }

    abort(404);
})->where('filename', '.*');
