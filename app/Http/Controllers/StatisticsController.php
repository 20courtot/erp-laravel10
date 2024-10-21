<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Produits fictifs
        $products = [
            ['id' => 1, 'name' => 'Produit A'],
            ['id' => 2, 'name' => 'Produit B'],
            ['id' => 3, 'name' => 'Produit C'],
            ['id' => 4, 'name' => 'Produit D'],
        ];

        return view('statistics.index', compact('products'));
    }

    public function showProductStatistics(Request $request)
    {
        $productId = $request->input('product_id');
    
        // Données fictives pour les statistiques en fonction du produit
        $salesPerMonth = [
            ['month' => 'January', 'count' => rand(20, 50)],
            ['month' => 'February', 'count' => rand(30, 60)],
            ['month' => 'March', 'count' => rand(25, 55)],
            ['month' => 'April', 'count' => rand(40, 70)],
            ['month' => 'May', 'count' => rand(50, 90)],
        ];
    
        // Calcul de la prévision des ventes pour les 4 mois suivants
        $totalSales = 0;
        $numMonths = count($salesPerMonth);
        
        foreach ($salesPerMonth as $sale) {
            $totalSales += $sale['count'];
        }
    
        // Calculer la moyenne
        $averageSales = $totalSales / $numMonths;
    
        // Générer les prévisions pour les 4 mois à venir
        $predictedSales = [];
        for ($i = 1; $i <= 4; $i++) {
            $predictedSales[] = round($averageSales);
        }
    
        $stockLevels = [
            'Produit A' => 20,
            'Produit B' => 50,
            'Produit C' => 10,
            'Produit D' => 35,
        ];
    
        $topProducts = [
            ['name' => 'Produit A', 'total_sales' => 100],
            ['name' => 'Produit B', 'total_sales' => 80],
            ['name' => 'Produit C', 'total_sales' => 60],
            ['name' => 'Produit D', 'total_sales' => 40],
        ];
    
        // Simuler les ventes de la semaine
        $currentWeekSales = rand(20, 50);
    
        // Passer les données à la vue pour le produit sélectionné
        return view('statistics.product', compact('salesPerMonth', 'stockLevels', 'topProducts', 'currentWeekSales', 'productId', 'predictedSales'));
    }

    // Fonction pour prédire les ventes à venir en utilisant une moyenne des ventes des derniers mois
    private function predictSales($salesPerMonth)
    {
        $totalSales = array_reduce($salesPerMonth, function ($carry, $item) {
            return $carry + $item['count'];
        }, 0);

        $numMonths = count($salesPerMonth);

        // Calcul de la moyenne des ventes des mois précédents
        if ($numMonths > 0) {
            return $totalSales / $numMonths;
        }

        return 0;
    }
}
