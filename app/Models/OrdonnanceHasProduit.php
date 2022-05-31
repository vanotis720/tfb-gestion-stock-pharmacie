<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdonnanceHasProduit extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosage',
        'quantite',
        'ordonnance_id',
        'produit_id',
        'price'
    ];
}
