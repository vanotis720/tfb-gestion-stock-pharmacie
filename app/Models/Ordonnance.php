<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable = [
        'datePrescription',
        'patient_id'
    ];

    /**
     * Get the recu associated with the ordonnance.
     */
    public function ordonnance()
    {
        return $this->hasOne(Recu::class);
    }

    /**
     * The produits that belong to the ordonnance.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'ordonnance_has_produits')->withPivot('dosage', 'quantite');
    }
}
