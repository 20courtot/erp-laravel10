<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'customer_id', 
        'total_amount'
    ];

    // Relation avec les clients
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relation avec les produits dans cette vente (via SalesItems)
    public function salesItems()
    {
        return $this->hasMany(SalesItem::class);
    }
}
