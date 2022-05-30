<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('signin', [AuthController::class, 'signin'])->name('signin'); //to remove

Route::middleware('auth')->group(
    function () {
        Route::get('/', [DashboardController::class, 'home']);
        Route::get('account', [AuthController::class, 'show'])->name('account');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('account/update', [AuthController::class, 'update'])->name('account.update');

        // admin specific action
        Route::get('users', [UserController::class, 'index'])->name('users.list');
        Route::get('user', [UserController::class, 'create'])->name('users.create');
        Route::post('user', [UserController::class, 'store'])->name('users.store');
        Route::get('user/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('fiches', [FicheController::class, 'index'])->name('fiches.list');
        Route::get('fiche/{id}/detail', [FicheController::class, 'show'])->name('fiche.detail');
        Route::get('fiche/{id?}', [FicheController::class, 'create'])->name('fiche.create');
        Route::get('fiche/{id}/edit', [FicheController::class, 'edit'])->name('fiche.edit');
        Route::post('fiche/{id}/update', [FicheController::class, 'update'])->name('fiche.update');
        Route::get('fiche/{id}/action/{action}/{route?}', [FicheController::class, 'action'])->name('fiche.action');

        Route::post('product', [ProduitController::class, 'store'])->name('product.store');
        Route::get('product/{id}/fiche/{fiche}/delete', [ProduitController::class, 'destroy'])->name('product.destroy');

        Route::get('facture/{id}/edit', [FactureController::class, 'edit'])->name('facture.edit');
        Route::post('facture/{id}/update', [FactureController::class, 'update'])->name('facture.update');
    }
);
