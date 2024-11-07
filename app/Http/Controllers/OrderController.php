<?php
// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Récupérer toutes les commandes avec leurs produits
        $orders = Order::with('product')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Affiche le formulaire de création de commande.
     */
    public function create()
    {
        // Récupérer tous les produits pour le menu déroulant
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Enregistre une nouvelle commande.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'expected_delivery_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'expected_delivery_date' => $request->expected_delivery_date,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.create')->with('success', 'Commande créée avec succès.');
    }

    /**
     * Affiche le formulaire d’édition de la commande.
     */
    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    /**
     * Met à jour la commande dans la base de données.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'expected_delivery_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        $order->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'expected_delivery_date' => $request->expected_delivery_date,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès.');
    }
}
