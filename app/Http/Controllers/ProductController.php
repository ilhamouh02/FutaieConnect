<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_Produit' => 'required|unique:FTC_products',
            'prix_Produit' => 'required|numeric',
            'visible' => 'required|boolean',
            'prise' => 'required|boolean',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'prix_Produit' => 'required|numeric',
            'visible' => 'required|boolean',
            'prise' => 'required|boolean',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}