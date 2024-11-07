<?php
namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            Order::create([
                'product_id' => $product->id,
                'quantity' => rand(1, 100),
                'status' => ['pending', 'completed', 'cancelled'][rand(0, 2)],
                'expected_delivery_date' => $this->getRandomDeliveryDate(),
                'description' => $this->getRandomDescription(),
            ]);
        }
    }

    /**
     * Génère une date de livraison aléatoire entre aujourd'hui et dans 30 jours.
     */
    private function getRandomDeliveryDate()
    {
        return Carbon::today()->addDays(rand(0, 30))->toDateString();
    }

    /**
     * Génère une description aléatoire pour la commande.
     */
    private function getRandomDescription()
    {
        $descriptions = [
            'Commande urgente, à livrer rapidement.',
            'Inclut des articles fragiles, manipuler avec soin.',
            'Client prioritaire, à traiter avec attention.',
            'Livraison à coordonner avec le client.',
            'Commande de réapprovisionnement pour le stock.',
            'Livraison prévue en magasin.',
            'Client VIP, inclure des échantillons.',
        ];

        return $descriptions[array_rand($descriptions)];
    }
}
