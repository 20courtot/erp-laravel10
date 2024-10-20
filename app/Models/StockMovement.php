<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'movement_type']; // movement_type: 'in' pour entrée, 'out' pour sortie

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
