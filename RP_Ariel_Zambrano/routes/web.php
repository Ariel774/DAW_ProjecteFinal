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
    /** Ambitos */
    Route::get('/ambitos/create', [AmbitoController::class, 'create'])->name('ambitos.create'); // Creamos los ambitos
    Route::get('/home', [AmbitoController::class, 'index'])->name('home');
    Route::post('/ambitos', [AmbitoController::class, 'store'])->name('ambitos.store');
    Route::get('/ambitos/{ambito}', [AmbitoController::class, 'show'])->name('ambitos.show');
    //Route::get('/dashboard/{ambito}/edit', [AmbitoController::class, 'edit'])->name('ambitos.edit'); // Editar
    Route::put('/ambitos/{ambito}', [AmbitoController::class, 'update'])->name('ambitos.update');
    Route::delete('/ambitos/{ambito}', [AmbitoController::class, 'destroy'])->name('ambitos.destroy');
    /** Ambitos */
    /** Objetivos */
    Route::get('/objetivos/create', [ObjetivoController::class, 'create'])->name('objetivos.create');
    Route::get('/objetivos/{objetivo}', [ObjetivoController::class, 'show'])->name('objetivos.show');
    Route::get('/objetivos/{objetivo}/edit', [ObjetivoController::class, 'edit'])->name('objetivos.edit'); // Editar
    Route::post('/objetivos', [ObjetivoController::class, 'store'])->name('objetivos.store');
    Route::delete('/objetivos/{objetivo}', [ObjetivoController::class, 'destroy'])->name('objetivos.destroy');
    /** Objetivos */
});

