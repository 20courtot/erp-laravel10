<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Chaise de bureau',
            'sku' => 'CHA-BUR-001',
            'price' => 75.50,
            'quantity_in_stock' => 150,
            'minimum_stock_level' => 30,
            'description' => 'Chaise de bureau ergonomique avec accoudoirs.'
        ]);

        Product::create([
            'name' => 'Table de salle à manger',
            'sku' => 'TAB-SAL-002',
            'price' => 200.00,
            'quantity_in_stock' => 20,
            'minimum_stock_level' => 10,
            'description' => 'Table en bois massif pour 6 personnes.'
        ]);

        Product::create([
            'name' => 'Lampe de chevet',
            'sku' => 'LMP-CHE-003',
            'price' => 35.99,
            'quantity_in_stock' => 80,
            'minimum_stock_level' => 20,
            'description' => 'Lampe de chevet en métal avec abat-jour en tissu.'
        ]);
    }
}
