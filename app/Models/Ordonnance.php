<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable = [
        'datePrescription',
        'status',
        'patient_id'
    ];

    /**
     * Get the recu associated with the ordonnance.
     */
    public function recu()
    {
        return $this->hasOne(Recu::class);
    }

    /**
     * The produits that belong to the ordonnance.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'ordonnance_has_produits')->withPivot('dosage', 'quantite', 'price');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public static function totalPrice($ordonnance)
    {
        $ordonnance = self::find($ordonnance);
        $produits = $ordonnance->produits;
        $amount = 0;

        foreach ($produits as $produit) {
            $amount += $produit->pivot->price * $produit->pivot->quantite;
        }

        return $amount;
    }
}
