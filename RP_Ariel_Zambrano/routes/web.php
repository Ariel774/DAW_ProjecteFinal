<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetivoController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes(['verify'=> true]); // Para verificar el email

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard/home', [ObjetivoController::class, 'index'])->name('dashboard.home'); // Vamos al home si estamos verificados
});

