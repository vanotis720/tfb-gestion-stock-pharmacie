<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $notification = $this->checkExpiration();
        return view('dashboard', compact('notification'));
    }

    public function checkExpiration()
    {
        return Produit::where('expiration', "<", Carbon::now())->get();
    }
}
