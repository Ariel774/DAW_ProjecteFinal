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
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'unidades_realizar' => 'required',
            'dia' => 'required',
        ]);
        $arrayDay = $request['dia'];
        foreach ($arrayDay as $dia_id) {
            SubObjetivo::create([ // Insertar los campos en la base de datos
                'nombre' => $request['nombre'],
                'descripcion' => $request['descripcion'] ?? '',
                'unidades_realizar' =>  $request['unidades_realizar'],
                'hora_inicio' => $request['hora_inicio'],
                'hora_fin' => $request['hora_fin'],
                'dia_id' => $dia_id,
                'objetivo_id' => $objetivo->id,
            ]);
        }    
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
