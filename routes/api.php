<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuoteRequestController;

// Public Auth Endpoints
Route::post('/login', [AuthController::class, 'login']);

// Public Read & Write Operations for Admin Console & Site
Route::get('/solutions', [SolutionController::class, 'index']);
Route::get('/solutions/{slug}', [SolutionController::class, 'show']);
Route::post('/solutions', [SolutionController::class, 'store']);
Route::put('/solutions/{id}', [SolutionController::class, 'update']);
Route::delete('/solutions/{id}', [SolutionController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slugOrId}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/jobs', [CareerController::class, 'index']);
Route::get('/jobs/{slugOrId}', [CareerController::class, 'show']);
Route::post('/jobs', [CareerController::class, 'store']);
Route::put('/jobs/{id}', [CareerController::class, 'update']);
Route::delete('/jobs/{id}', [CareerController::class, 'destroy']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slugOrId}', [NewsController::class, 'show']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);

Route::get('/preferences', [PreferenceController::class, 'show']);
Route::post('/preferences', [PreferenceController::class, 'update']);

Route::get('/team', [TeamController::class, 'index']);
Route::post('/team', [TeamController::class, 'store']);

Route::get('/submissions', [SubmissionController::class, 'index']);
Route::post('/submissions', [SubmissionController::class, 'store']);
Route::put('/submissions/{id}', [SubmissionController::class, 'update']);
Route::delete('/submissions/{id}', [SubmissionController::class, 'destroy']);

Route::get('/messages', [ContactMessageController::class, 'index']);
Route::post('/messages', [ContactMessageController::class, 'store']);
Route::put('/messages/{id}', [ContactMessageController::class, 'update']);
Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy']);

Route::get('/requests', [QuoteRequestController::class, 'index']);
Route::post('/requests', [QuoteRequestController::class, 'store']);
Route::put('/requests/{id}', [QuoteRequestController::class, 'update']);
Route::delete('/requests/{id}', [QuoteRequestController::class, 'destroy']);

Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index']);
Route::post('/roles', [\App\Http\Controllers\RoleController::class, 'store']);
Route::put('/roles/{id}', [\App\Http\Controllers\RoleController::class, 'update']);
Route::delete('/roles/{id}', [\App\Http\Controllers\RoleController::class, 'destroy']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

// Protected Admin Endpoints
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
