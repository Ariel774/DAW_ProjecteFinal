<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadisticasController extends Controller
{
    public function index()
    {
        $objetivosTotales = auth()->user()->objetivos()->count();
        $objetivosHechos = auth()->user()->objetivos()->where('finalizado', true)->count();
        $objetivosPendientes = auth()->user()->objetivos()->where('finalizado', false)->count();
        $objetivos = Objetivo::where('user_id', auth()->user()->id)->paginate(5); // Obtener todos los objetivos
        return view('dashboard.estadisticas.index',  compact('objetivos','objetivosTotales', 'objetivosHechos', 'objetivosPendientes'));
    }
}
