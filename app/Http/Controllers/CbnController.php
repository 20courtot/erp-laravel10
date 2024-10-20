<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Forecast;
use App\Models\Order;
use Illuminate\Http\Request;

class CbnController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cbnResults = [];

        foreach ($products as $product) {
            // Calcul du besoin brut (quantité à vendre selon les prévisions)
            $besoinBrut = Forecast::where('product_id', $product->id)->sum('forecasted_quantity');
            
            // Stock disponible actuel
            $stockDisponible = $product->quantity_in_stock;

            // Commandes en cours (commandes déjà passées mais non encore livrées)
            $commandesEnCours = Order::where('product_id', $product->id)->where('status', 'pending')->sum('quantity');
            
            // Calcul du besoin net
            $besoinNet = $besoinBrut - ($stockDisponible + $commandesEnCours);

            // Vérifier si le besoin net est supérieur à zéro, sinon il n'y a pas de besoin de commander
            if ($besoinNet > 0) {
                $cbnResults[] = [
                    'product_name' => $product->name,
                    'besoin_brut' => $besoinBrut,
                    'stock_disponible' => $stockDisponible,
                    'commandes_en_cours' => $commandesEnCours,
                    'besoin_net' => $besoinNet,
                    'seuil_minimum' => $product->minimum_stock_level,
                ];
            }
        }

        return view('cbn.index', compact('cbnResults'));
    }
}
