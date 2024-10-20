<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SalesItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run()
    {
        // Vente 1
        $sale1 = Sale::create([
            'customer_id' => Customer::where('email', 'marie.dupont@example.com')->first()->id,
            'total_amount' => 1525.00,
        ]);

        SalesItem::create([
            'sale_id' => $sale1->id,
            'product_id' => Product::where('sku', 'MEU-001')->first()->id,
            'quantity' => 1,
            'price' => 1500.00,
        ]);

        SalesItem::create([
            'sale_id' => $sale1->id,
            'product_id' => Product::where('sku', 'DEC-003')->first()->id,
            'quantity' => 1,
            'price' => 25.00,
        ]);

        // Vente 2
        $sale2 = Sale::create([
            'customer_id' => Customer::where('email', 'luc.martin@example.com')->first()->id,
            'total_amount' => 950.00,
        ]);

        SalesItem::create([
            'sale_id' => $sale2->id,
            'product_id' => Product::where('sku', 'MEU-002')->first()->id,
            'quantity' => 1,
            'price' => 800.00,
        ]);

        SalesItem::create([
            'sale_id' => $sale2->id,
            'product_id' => Product::where('sku', 'DEC-001')->first()->id,
            'quantity' => 1,
            'price' => 120.00,
        ]);

        SalesItem::create([
            'sale_id' => $sale2->id,
            'product_id' => Product::where('sku', 'DEC-003')->first()->id,
            'quantity' => 1,
            'price' => 25.00,
        ]);
    }
}
