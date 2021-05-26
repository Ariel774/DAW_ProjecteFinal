<?php

namespace App\Http\Controllers;

use App\Models\Ambito;
use App\Models\Objetivo;
use App\Models\SubObjetivo;
use Illuminate\Http\Request;

class SubObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ambito $ambito, Objetivo $objetivo)
    {
        return view('dashboard.sub-objetivos.create', compact('ambito', 'objetivo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ambito $ambito, Objetivo $objetivo)
    {
        request()->validate([ // Validaciones
            'nombre' => 'required|min:6',
            'unidades_realizar' => 'required',
            'dias' => 'required',
            'color' => 'required'
        ]);
        $dias = "";
        $arrayDay = $request['dias'];
        foreach ($arrayDay as $dia) {
            $dias .= $dia.",";
        }
        $dias = substr($dias, 0, -1); // Borramos la coma final
        SubObjetivo::create([ // Insertar los campos en la base de datos
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'] ?? '',
            'unidades_realizar' =>  $request['unidades_realizar'],
            'hora_inicio' => $request['hora_inicio'] ?? NULL,
            'hora_fin' => $request['hora_fin'] ?? NULL,
            'dias' => $dias,
            'objetivo_id' => $objetivo->id,
        ]);
        // Creamos el calendario
        auth()->user()->calendarios()->create([
            'title' => $request['nombre'],
            'start' => $objetivo->fecha_inicio,
            'end' => $objetivo->fecha_fin,
            'daysOfWeek' => $dias,
            'startTime' => $request['hora_inicio'] ?? NULL,
            'endTime' => $request['hora_fin'] ?? NULL,
            'startRecur' => $objetivo->fecha_inicio,
            'endRecur' => $objetivo->fecha_fin,
            'color' => $request['color']
        ]);
        return redirect('/dashboard/ambitos/'.$ambito->slug.'/objetivos/'.$objetivo->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function show(SubObjetivo $subObjetivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function edit(SubObjetivo $subObjetivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubObjetivo $subObjetivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubObjetivo $subObjetivo)
    {
        //
    }
}
