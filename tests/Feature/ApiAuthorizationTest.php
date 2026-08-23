<?php

use App\Models\User;
use App\Models\Solution;
use App\Models\Product;
use App\Models\Career;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('public users can list and view solutions, products, and jobs', function () {
    $solution = Solution::create([
        'slug' => 'test-solution',
        'status' => 'Published',
        'translations' => ['en' => ['title' => 'Test Solution']],
    ]);

    $product = Product::create([
        'sku' => 'PROD-123',
        'slug' => 'test-product',
        'category' => 'Hardware',
        'translations' => ['en' => ['title' => 'Test Product']],
    ]);

    $job = Career::create([
        'slug' => 'dev-job',
        'department' => 'Engineering',
        'location' => 'Remote',
        'type' => 'Full-time',
        'translations' => ['en' => ['title' => 'Developer']],
    ]);

    // Public GET requests should succeed
    $this->getJson('/api/solutions')->assertStatus(200);
    $this->getJson("/api/solutions/{$solution->slug}")->assertStatus(200);

    $this->getJson('/api/products')->assertStatus(200);
    $this->getJson("/api/products/{$product->slug}")->assertStatus(200);

    $this->getJson('/api/jobs')->assertStatus(200);
    $this->getJson("/api/jobs/{$job->slug}")->assertStatus(200);
});

test('unauthenticated users cannot create, edit, or delete items', function () {
    // Unauthenticated POST, PUT, DELETE should return 401
    $this->postJson('/api/solutions', [
        'slug' => 'new-sol',
        'translations' => ['en' => ['title' => 'New Sol']],
    ])->assertStatus(401);

    $this->putJson('/api/solutions/1', [
        'slug' => 'new-sol',
        'translations' => ['en' => ['title' => 'New Sol']],
    ])->assertStatus(401);

    $this->deleteJson('/api/solutions/1')->assertStatus(401);

    $this->postJson('/api/products', [
        'sku' => 'SKU-001',
        'slug' => 'new-prod',
        'category' => 'Tech',
        'translations' => ['en' => ['title' => 'New Prod']],
    ])->assertStatus(401);

    $this->postJson('/api/jobs', [
        'slug' => 'new-job',
        'department' => 'Sales',
        'location' => 'Office',
        'type' => 'Full-time',
        'translations' => ['en' => ['title' => 'Sales Lead']],
    ])->assertStatus(401);
});

test('authenticated admin user can create, edit, and delete items', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    // Create Solution
    $resSol = $this->postJson('/api/solutions', [
        'slug' => 'admin-solution',
        'translations' => ['en' => ['title' => 'Admin Solution']],
    ]);
    $resSol->assertStatus(201);
    $solId = $resSol->json('id');

    // Edit Solution
    $this->putJson("/api/solutions/{$solId}", [
        'slug' => 'admin-solution-updated',
        'translations' => ['en' => ['title' => 'Updated Solution']],
    ])->assertStatus(200);

    // Delete Solution
    $this->deleteJson("/api/solutions/{$solId}")->assertStatus(200);
});
