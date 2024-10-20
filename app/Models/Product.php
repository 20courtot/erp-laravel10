<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'sku', 
        'price', 
        'quantity_in_stock', 
        'description', 
        'minimum_stock_level' // seuil de stock minimum
    ];

    public function salesItems()
    {
        return $this->hasMany(SalesItem::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function forecasts()
    {
        return $this->hasMany(Forecast::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
