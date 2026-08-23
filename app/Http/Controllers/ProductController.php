<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Helper to process base64 image strings and store them to disk.
     */
    private function processImage(?string $imageInput): string
    {
        if (!$imageInput) {
            return '/assets/sim-card.png';
        }

        // If the image is a full URL pointing to our own backend storage, strip to relative path
        $appUrl = rtrim(config('app.url', ''), '/');
        if ($appUrl && str_starts_with($imageInput, $appUrl . '/storage/')) {
            return str_replace($appUrl, '', $imageInput);
        }

        // If it's already a relative /storage/ or /assets/ path, keep it as-is
        if (str_starts_with($imageInput, '/storage/') || str_starts_with($imageInput, '/assets/')) {
            return $imageInput;
        }

        // If it's a full http URL to another domain, keep it as-is
        if (str_starts_with($imageInput, 'http://') || str_starts_with($imageInput, 'https://')) {
            return $imageInput;
        }

        // If it's a base64 data URI, save it as a file in public/storage/products/
        if (preg_match('/^data:image\/(\w+);base64,/', $imageInput, $type)) {
            $data = substr($imageInput, strpos($imageInput, ',') + 1);
            $type = strtolower($type[1]); // png, jpg, jpeg, webp, etc.

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png', 'webp', 'svg'])) {
                $type = 'png';
            }

            $data = base64_decode($data);
            if ($data !== false) {
                $fileName = 'prod_' . time() . '_' . Str::random(8) . '.' . $type;

                // Path 1: Primary public_path (e.g. public_html/storage/products or public/storage/products)
                $pubDir = public_path('storage/products');
                if (!file_exists($pubDir)) {
                    @mkdir($pubDir, 0755, true);
                }
                @file_put_contents($pubDir . '/' . $fileName, $data);

                // Path 2: Storage path fallback (storage/app/public/products)
                $appStorageDir = storage_path('app/public/products');
                if (!file_exists($appStorageDir)) {
                    @mkdir($appStorageDir, 0755, true);
                }
                @file_put_contents($appStorageDir . '/' . $fileName, $data);

                return '/storage/products/' . $fileName;
            }
        }

        return $imageInput;
    }

    /**
     * Resolve a stored image path to a full URL accessible from the frontend.
     */
    private function resolveImageUrl(?string $imagePath): string
    {
        if (!$imagePath || $imagePath === '') {
            return '/assets/sim-card.png';
        }

        // Already a full URL — return as-is
        if (str_starts_with($imagePath, 'http://') || str_starts_with($imagePath, 'https://')) {
            return $imagePath;
        }

        // Already a base64 data URI — return as-is
        if (str_starts_with($imagePath, 'data:image/')) {
            return $imagePath;
        }

        // Relative /storage/ path — convert to full backend URL
        if (str_starts_with($imagePath, '/storage/')) {
            return url($imagePath);
        }

        // Relative /assets/ path — return as-is (frontend static asset)
        if (str_starts_with($imagePath, '/assets/')) {
            return $imagePath;
        }

        return $imagePath;
    }

    /**
     * Display a listing of all products.
     */
    public function index(): JsonResponse
    {
        $products = Product::orderBy('id', 'asc')->get()->map(function ($product) {
            $product->productType = $product->product_type;
            $product->image = $this->resolveImageUrl($product->image);
            return $product;
        });
        return response()->json($products);
    }

    /**
     * Display the specified product by slug or ID.
     */
    public function show(string $slugOrId): JsonResponse
    {
        $product = Product::where('slug', $slugOrId)
            ->orWhere('id', is_numeric($slugOrId) ? (int)$slugOrId : 0)
            ->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->productType = $product->product_type;
        $product->image = $this->resolveImageUrl($product->image);

        return response()->json($product);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $name = $request->input('translations.en.name') ?? ($request->input('name') ?? 'New Product');
        $sku = $request->input('sku') ?: 'SKU-' . strtoupper(substr(md5(uniqid()), 0, 8));
        $slug = $request->input('slug') ?: \Illuminate\Support\Str::slug($name);

        $imagePath = $this->processImage($request->input('image'));

        $product = Product::create([
            'sku' => $sku,
            'slug' => $slug,
            'category' => $request->input('category') ?? 'SIM Cards',
            'brand' => $request->input('brand') ?? 'Ooredoo',
            'product_type' => $request->input('productType') ?? ($request->input('product_type') ?? 'SIM Card'),
            'value' => $request->input('value') ?? 'Prepaid',
            'status' => $request->input('status') ?? 'Published',
            'image' => $imagePath,
            'translations' => $request->input('translations') ?? [
                'en' => ['name' => $name, 'shortDescription' => '', 'description' => '', 'features' => [], 'specifications' => [], 'faqs' => []],
                'ar' => ['name' => $name, 'shortDescription' => '', 'description' => '', 'features' => [], 'specifications' => [], 'faqs' => []],
                'fr' => ['name' => $name, 'shortDescription' => '', 'description' => '', 'features' => [], 'specifications' => [], 'faqs' => []],
            ],
        ]);

        $product->productType = $product->product_type;
        $product->image = $this->resolveImageUrl($product->image);

        return response()->json($product, 201);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $name = $request->input('translations.en.name') ?? ($request->input('name') ?? ($product->translations['en']['name'] ?? 'Product'));
        $sku = $request->input('sku') ?: $product->sku;
        $slug = $request->input('slug') ?: $product->slug;

        $imageInput = $request->input('image');
        $imagePath = $imageInput !== null ? $this->processImage($imageInput) : $product->image;

        $product->update([
            'sku' => $sku,
            'slug' => $slug,
            'category' => $request->input('category') ?? $product->category,
            'brand' => $request->input('brand') ?? $product->brand,
            'product_type' => $request->input('productType') ?? ($request->input('product_type') ?? $product->product_type),
            'value' => $request->input('value') ?? $product->value,
            'status' => $request->input('status') ?? $product->status,
            'image' => $imagePath,
            'translations' => $request->input('translations') ?? $product->translations,
        ]);

        $product->productType = $product->product_type;
        $product->image = $this->resolveImageUrl($product->image);

        return response()->json($product);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Product deleted']);
    }
}
