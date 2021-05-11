<?php

use App\Http\Controllers\AmbitoController;
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

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.','middleware' => ['auth', 'verified']], function() {
    
    Route::get('/ambitos/create', [AmbitoController::class, 'create'])->name('ambitos.create'); // Creamos los ambitos
    Route::get('/home', [AmbitoController::class, 'index'])->name('home');
    Route::post('/ambitos', [AmbitoController::class, 'store'])->name('ambitos.store');
    //Route::get('/dashboard/{ambito}/edit', [AmbitoController::class, 'edit'])->name('edit');
    //Route::put('/dashboard/{ambito}', [AmbitoController::class, 'update'])->name('update');
    Route::delete('/ambitos/{ambito}', [AmbitoController::class, 'destroy'])->name('ambitos.destroy');

    //Route::get('/dashboard/home', [ObjetivoController::class, 'index'])->name('dashboard.home'); // Vamos al home si estamos verificados
});

