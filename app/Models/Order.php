<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis en masse
    protected $fillable = [
        'product_id',
        'quantity',
        'status',
        'expected_delivery_date',
        'description'
    ];

    protected $casts = [
        'expected_delivery_date' => 'date',
    ];

    /**
     * Définir la relation avec le modèle Product.
     * Chaque commande est associée à un produit.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Obtenir les différents statuts disponibles pour une commande.
     */
    public static function getStatuses()
    {
        return [
            'pending' => 'En attente',
            'completed' => 'Terminée',
            'cancelled' => 'Annulée',
        ];
    }

    /**
     * Vérifier si une commande est terminée.
     */
    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    /**
     * Vérifier si une commande est annulée.
     */
    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
}
