<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Afficher la liste des produits
    public function index()
    {
        $products = Product::all();
        return view('stocks.products.index', compact('products'));
    }

    // Afficher le formulaire de création d'un produit
    public function create()
    {
        return view('stocks.products.create');
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products', // Validation pour SKU unique
            'price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer|min:0', // Validation pour la quantité
            'description' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('stocks.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    // Afficher le formulaire d'édition d'un produit
    public function edit(Product $product)
    {
        return view('stocks.products.edit', compact('product'));
    }

    // Mettre à jour un produit existant
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id, // Validation SKU pour l'édition
            'price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('stocks.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('stocks.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
