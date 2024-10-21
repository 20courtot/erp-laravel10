<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Commandes pour "Chaise de bureau"
        Order::create([
            'product_id' => 1,
            'quantity' => 50,
            'status' => 'pending' // Commande en attente
        ]);

        // Commandes pour "Table de salle à manger"
        Order::create([
            'product_id' => 2,
            'quantity' => 10,
            'status' => 'completed' // Commande complétée
        ]);

        // Commandes pour "Lampe de chevet"
        Order::create([
            'product_id' => 3,
            'quantity' => 20,
            'status' => 'pending' // Commande en attente
        ]);
    }
}
