<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'sale_id', 
        'product_id', 
        'quantity', 
        'price'
    ];

    // Relation avec les ventes
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    // Relation avec les produits
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
