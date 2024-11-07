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
        $products = [
            [
                'name' => 'Chaise de bureau',
                'sku' => 'CHA-BUR-001',
                'price' => 75.50,
                'quantity_in_stock' => 150,
                'minimum_stock_level' => 30,
                'description' => 'Chaise de bureau ergonomique avec accoudoirs.'
            ],
            [
                'name' => 'Table de salle à manger',
                'sku' => 'TAB-SAL-002',
                'price' => 200.00,
                'quantity_in_stock' => 20,
                'minimum_stock_level' => 10,
                'description' => 'Table en bois massif pour 6 personnes.'
            ],
            [
                'name' => 'Lampe de chevet',
                'sku' => 'LMP-CHE-003',
                'price' => 35.99,
                'quantity_in_stock' => 80,
                'minimum_stock_level' => 20,
                'description' => 'Lampe de chevet en métal avec abat-jour en tissu.'
            ],
            [
                'name' => 'Canapé 3 places',
                'sku' => 'CAN-3P-004',
                'price' => 499.99,
                'quantity_in_stock' => 10,
                'minimum_stock_level' => 5,
                'description' => 'Canapé en tissu doux, design contemporain.'
            ],
            [
                'name' => 'Bibliothèque murale',
                'sku' => 'BIB-MUR-005',
                'price' => 120.75,
                'quantity_in_stock' => 40,
                'minimum_stock_level' => 10,
                'description' => 'Bibliothèque en bois, plusieurs étagères.'
            ],
            [
                'name' => 'Commode 4 tiroirs',
                'sku' => 'COM-4TIR-006',
                'price' => 89.90,
                'quantity_in_stock' => 70,
                'minimum_stock_level' => 15,
                'description' => 'Commode en bois clair, tiroirs spacieux.'
            ],
            [
                'name' => 'Lit double',
                'sku' => 'LIT-DBL-007',
                'price' => 350.00,
                'quantity_in_stock' => 5,
                'minimum_stock_level' => 3,
                'description' => 'Lit double avec sommier, design classique.'
            ],
            [
                'name' => 'Bureau d\'angle',
                'sku' => 'BUR-ANG-008',
                'price' => 150.00,
                'quantity_in_stock' => 25,
                'minimum_stock_level' => 10,
                'description' => 'Bureau d\'angle avec étagères intégrées.'
            ],
            [
                'name' => 'Armoire 2 portes',
                'sku' => 'ARM-2PRT-009',
                'price' => 250.50,
                'quantity_in_stock' => 12,
                'minimum_stock_level' => 5,
                'description' => 'Armoire spacieuse avec 2 portes et étagères.'
            ],
            [
                'name' => 'Chaise pliante',
                'sku' => 'CHA-PLI-010',
                'price' => 15.00,
                'quantity_in_stock' => 200,
                'minimum_stock_level' => 50,
                'description' => 'Chaise pliante en métal, facile à ranger.'
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}

