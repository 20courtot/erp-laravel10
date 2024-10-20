<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'product_id', 
        'type',  // 'in' ou 'out'
        'quantity'
    ];

    // Relation avec les produits
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
