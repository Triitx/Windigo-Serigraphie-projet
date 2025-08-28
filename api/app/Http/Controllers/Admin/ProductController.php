<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
public function index()
{
    $products = Product::with(['category', 'option'])->get();

    // Ajouter dynamiquement l'URL complète de l'image
    $products = $products->map(function ($product) {
        $product->picture_url = $product->picture ? asset('storage/' . $product->picture) : null;
        return $product;
    });

    return response()->json($products);
}

public function show($id)
{
    $product = Product::with(['category', 'option'])->findOrFail($id);
    $product->picture_url = $product->picture ? asset('storage/' . $product->picture) : null;
    return response()->json($product);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer|between:1,50',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'archived' => 'boolean',
            'option_id' => 'required|exists:options,id',
            'category_id' => 'required|exists:categories,id',
            'picture' => 'nullable|image|max:2048'
        ]);
        $product = new Product();
        $product->fill($validated);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('products', 'public');
        }

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
            'description' => 'string',
            'archived' => 'boolean',
            'option_id' => 'exists:options,id',
            'category_id' => 'exists:categories,id',
            'picture' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('picture')) {
            if ($product->picture) {
                Storage::disk('public')->delete($product->picture);
            }
            $validated['picture'] = $request->file('picture')->store('products', 'public');
        }

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->picture) {
            Storage::disk('public')->delete($product->picture);
        }

        $product->delete();
        return response()->json(['message' => 'Produit supprimé']);
    }
}
