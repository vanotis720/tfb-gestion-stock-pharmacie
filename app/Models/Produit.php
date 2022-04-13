<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'condition',
        'quantite',
        'fiches_id',
    ];

    public static function getByFiche($fiche)
    {
        $products = DB::table('produits')->where('fiches_id', $fiche)->orderBy('created_at')->get();
        return $products;
    }
}
