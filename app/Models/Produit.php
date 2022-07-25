<?php

namespace App\Models;

use Carbon\Carbon;
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
        'expiration',
        'init_quantity'
    ];

    public static function getByFiche($fiche)
    {
        return DB::table('produits')->where('fiches_id', $fiche)->orderBy('created_at')->get();
    }

    public static function count($type = null)
    {
        if ($type == null) {
            return DB::table('produits')
                ->join('fiches', 'fiches.id', 'produits.fiches_id')
                ->where('fiches.status', 'validated')
                ->where('produits.quantite', '>', 0)
                ->sum('quantite');
        } else {
            return DB::table('produits')
                ->join('fiches', 'fiches.id', 'produits.fiches_id')
                ->where('fiches.status', 'validated')
                ->where('produits.quantite', '>', 0)
                ->distinct('nom')->count();
        }
    }

    /**
     * Get the fiche that owns the produit.
     */
    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }

    /**
     * The ordonnance that belong to the produit.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'ordonnance_has_produits')->withPivot('dosage', 'quantite');
    }

    public static function reduceQuantity($product, $quantity)
    {
        $product = Produit::find($product);
        $product->quantite -= $quantity;
        return $product->save();
    }

    public static function addQuantity($product, $quantity)
    {
        $product = Produit::find($product);
        $product->quantite += $quantity;
        return $product->save();
    }

    public static function getQuantity($id)
    {
        return (self::find($id))->quantite;
    }

    public static function checkExpiration()
    {
        return Produit::whereRaw('quantite < init_quantity / 2')->get();
    }
}
