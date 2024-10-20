<?php

namespace Database\Seeders;

use App\Models\Forecast;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Previsions pour "Chaise de bureau"
        Forecast::create([
            'product_id' => 1,
            'forecasted_quantity' => 120, // Prévision de vente
            'date' => Carbon::now()->addMonths(1) // Prévision pour le mois suivant
        ]);

        Forecast::create([
            'product_id' => 1,
            'forecasted_quantity' => 100,
            'date' => Carbon::now()->addMonths(2)
        ]);

        // Previsions pour "Table de salle à manger"
        Forecast::create([
            'product_id' => 2,
            'forecasted_quantity' => 15,
            'date' => Carbon::now()->addMonths(1)
        ]);

        Forecast::create([
            'product_id' => 2,
            'forecasted_quantity' => 12,
            'date' => Carbon::now()->addMonths(2)
        ]);

        // Previsions pour "Lampe de chevet"
        Forecast::create([
            'product_id' => 3,
            'forecasted_quantity' => 70,
            'date' => Carbon::now()->addMonths(1)
        ]);

        Forecast::create([
            'product_id' => 3,
            'forecasted_quantity' => 60,
            'date' => Carbon::now()->addMonths(2)
        ]);
    }
}
