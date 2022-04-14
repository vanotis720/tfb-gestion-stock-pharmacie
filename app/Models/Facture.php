<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'organisation',
        'dateAchat',
        'users_id',
        'fiches_id',
    ];

    public static function getPrice($fiche)
    {
        $facture = DB::table('factures')->where('fiches_id',$fiche)->first();
        return $facture->price ?? 0;
    }
}
