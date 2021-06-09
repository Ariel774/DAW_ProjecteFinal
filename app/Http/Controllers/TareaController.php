<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Carbon\Carbon;
use App\Models\Tarea;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todayDate = Carbon::now('Europe/Madrid')->format('d-m-Y'); // Obtener la fecha actual
        $usuario = auth()->user()->id;
        $tareas = Tarea::where('user_id', $usuario)->where('fecha_tarea', Carbon::now('Europe/Madrid')->format('Y-m-d') )->paginate(4);
        return view('dashboard.tareas.index', compact('tareas', 'todayDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $objetivo = Objetivo::where('id', $tarea->objetivo_id)->first();
        $objetivo->increment('unidades_actuales', $tarea->unidades_realizar);
        //$objetivo->unidades_actuales = $tarea->unidades_realizar;
        $objetivo->save();
        $this->checkObjetivo($objetivo); // Comprobamos si está completado
        $tarea->delete();
    }
    public function checkObjetivo(Objetivo $objetivo)
    {
        if($objetivo->unidades_actuales >= $objetivo->unidades_fin) {
            $objetivo->finalizado = true;
            $objetivo->save();
        }
        return;
    }

}
