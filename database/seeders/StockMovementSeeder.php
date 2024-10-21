<?php

namespace Database\Seeders;

use App\Models\StockMovement;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mouvements de stock pour "Chaise de bureau"
        StockMovement::create([
            'product_id' => 1,
            'quantity' => 20,
            'movement_type' => 'in' // Réception de stock
        ]);

        StockMovement::create([
            'product_id' => 1,
            'quantity' => 10,
            'movement_type' => 'out' // Vente de stock
        ]);

        // Mouvements de stock pour "Table de salle à manger"
        StockMovement::create([
            'product_id' => 2,
            'quantity' => 5,
            'movement_type' => 'in'
        ]);

        StockMovement::create([
            'product_id' => 2,
            'quantity' => 7,
            'movement_type' => 'out'
        ]);

        // Mouvements de stock pour "Lampe de chevet"
        StockMovement::create([
            'product_id' => 3,
            'quantity' => 15,
            'movement_type' => 'in'
        ]);

        StockMovement::create([
            'product_id' => 3,
            'quantity' => 5,
            'movement_type' => 'out'
        ]);
    }
}
