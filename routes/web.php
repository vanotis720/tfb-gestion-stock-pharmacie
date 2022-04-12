<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ApplicantController;
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

Route::post('login', [UserController::class, 'login'])->name('login.post');

Route::get('signin', [UserController::class, 'signin'])->name('signin'); //to remove

Route::middleware('auth')->group(
    function () {

        Route::get('/', [DashboardController::class, 'home']);
        
        Route::get('account', [UserController::class, 'show'])->name('account');

        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    }
);
