<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'name', 
        'email', 
        'phone_number', 
        'address'
    ];

    // Relation avec les ventes
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
