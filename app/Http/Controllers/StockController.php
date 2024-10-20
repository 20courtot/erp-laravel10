<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer tous les produits
        $query = Product::query();

        // Appliquer des filtres
        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'out_of_stock':
                    $query->where('quantity_in_stock', 0);
                    break;
                case 'near_out_of_stock':
                    $query->where('quantity_in_stock', '<=', DB::raw('min_quantity_level'));
                    break;
            }
        }

        // Récupérer les produits avec pagination
        $products = $query->paginate(10);

        // Calcul des indicateurs
        $outOfStock = Product::where('quantity_in_stock', 0)->count();
        $nearOutOfStock = Product::where('quantity_in_stock', '<=', 5)->count(); // Proche de la rupture
        $totalProducts = Product::count();

        return view('stocks.index', compact('products', 'outOfStock', 'nearOutOfStock', 'totalProducts'));
    }
}
