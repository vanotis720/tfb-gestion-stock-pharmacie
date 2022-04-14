<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fiche extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'status',
        'no_fiche',
    ];

    public static function getLast($limit)
    {
        return DB::table('fiches')
            ->where('status', '!=', 'init')
            ->orderBy('created_at')
            ->limit($limit)
            ->get();
    }
}
