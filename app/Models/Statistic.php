<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'date', 
        'total_sales', 
        'predicted_sales'
    ];
}
