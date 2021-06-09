<?php

use App\Models\SubObjetivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmbitoController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\SubObjetivoController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TareaController;
use App\Models\Tarea;

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
    Route::get('/ambitos/create', [AmbitoController::class, 'create'])->name('ambitos.create')->middleware('revisarAmbitoCreado'); // Creamos los ambitos
    Route::get('/home', [AmbitoController::class, 'index'])->name('home')->middleware('revisarAmbito');
    Route::post('/ambitos', [AmbitoController::class, 'store'])->name('ambitos.store');
    Route::get('/ambitos/{ambito}', [AmbitoController::class, 'show'])->name('ambitos.show');
    //Route::get('/dashboard/{ambito}/edit', [AmbitoController::class, 'edit'])->name('ambitos.edit'); // Editar
    Route::put('/ambitos/{ambito}', [AmbitoController::class, 'update'])->name('ambitos.update');
    Route::delete('/ambitos/{ambito}', [AmbitoController::class, 'destroy'])->name('ambitos.destroy');
    /** Ambitos */
    /** Objetivos */
    Route::get('/objetivos', [ObjetivoController::class, 'index'])->name('objetivos.index');
    Route::get('/ambitos/{ambito}/objetivos/create', [ObjetivoController::class, 'create'])->name('objetivos.create');
    Route::get('/ambitos/{ambito?}/objetivos/{objetivo}', [ObjetivoController::class, 'show'])->name('objetivos.show');
    Route::get('/ambitos/{ambito?}/objetivos/{objetivo}/edit', [ObjetivoController::class, 'edit'])->name('objetivos.edit'); // Editar
    Route::post('/ambitos/{ambito}/objetivos', [ObjetivoController::class, 'store'])->name('objetivos.store');
    Route::put('/ambitos/{ambito?}/objetivos/{objetivo}', [ObjetivoController::class, 'update'])->name('objetivos.update');
    Route::delete('/objetivos/{objetivo}', [ObjetivoController::class, 'destroy'])->name('objetivos.destroy');
    /** Objetivos */
    /** SubObjetivos */
    Route::get('/ambitos/{ambito?}/objetivos/{objetivo}/sub-objetivos/create', [SubObjetivoController::class, 'create'])->name('sub-objetivos.create');
    Route::get('/ambitos/{ambito?}/objetivos/{objetivo}/sub-objetivos/{subObjetivo}', [SubObjetivoController::class, 'show'])->name('sub-objetivos.show');
    Route::put('/ambitos/{ambito?}/objetivos/{objetivo}/sub-objetivos/{subObjetivo}', [SubObjetivoController::class, 'update'])->name('sub-objetivos.update');
    Route::post('/ambitos/{ambito?}/objetivos/{objetivo}/sub-objetivos', [SubObjetivoController::class, 'store'])->name('sub-objetivos.store');
    Route::delete('/sub-objetivos/{subObjetivo}', [SubObjetivoController::class, 'destroy'])->name('sub-objetivos.destroy');
    Route::get('/ambitos/{ambito?}/objetivos/{objetivo?}/sub-objetivos/{subObjetivo}/edit', [SubObjetivoController::class, 'edit'])->name('sub-objetivos.edit');
    /** SubObjetivos */

    /** Calendario */
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');
    Route::post('/calendario', [CalendarioController::class, 'store'])->name('calendario.store');
    Route::get('/calendario/show', [CalendarioController::class, 'show'])->name('calendario.show');
    // Route::put('/calendario/{calendario}', [CalendarioController::class, 'update'])->name('calendario.update');
    // Route::delete('/calendario/{calendario}', [CalendarioController::class, 'destroy'])->name('calendario.destroy');
    /** Calendario */

    /** Tareas */
    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');

    /** Estadísticas */
    Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');

    /** Perfil */
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::put('/perfil/{perfil}', [PerfilController::class, 'update'])->name('perfil.update');



});

