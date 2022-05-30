<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'datePaiement',
        'ordonnance_id',
    ];

    /**
     * Get the ordonnance that owns the recu.
     */
    public function ordonnance()
    {
        return $this->belongsTo(Ordonnance::class);
    }
}
