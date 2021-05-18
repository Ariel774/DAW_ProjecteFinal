<?php

namespace App\Http\Controllers;

use App\Models\Ambito;
use App\Models\Objetivo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Ambito $ambito)
    {
        return view('dashboard.objetivos.create', compact('ambito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ambito $ambito)
    {
        request()->validate([ // Validaciones
            'nombre' => 'required|min:6',
            'descripcion' => 'required|min:10',
            'imagen' => 'required|image',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'unidades_fin' => 'required',
            'unidad' => 'required'
        ]);
        $ruta_imagen = $request['imagen']->store('upload-objetivos', 'public');

        auth()->user()->objetivos()->create([ // Insertar los campos en la base de datos
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'slug' => Str::slug($request['nombre']),
            'imagen' => $ruta_imagen,
            'unidades_actuales' =>  0,
            'unidades_fin' =>  $request['unidades_fin'],
            'unidad' =>  $request['unidad'],
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin' => $request['fecha_fin'],
            'porcentaje' => "00.00",
            'finalizado' => false,
            'ambito_id' => $ambito->id,
        ]);
        return redirect('/dashboard/ambitos/'.$ambito->slug); // Redireccionar hacia el index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function show(Objetivo $objetivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambito $ambito, Objetivo $objetivo)
    {
        return view('dashboard.objetivos.edit', compact('objetivo', 'ambito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambito $ambito, Objetivo $objetivo)
    {
        request()->validate([ // Validaciones
            'nombre' => 'required|min:6',
            'descripcion' => 'required|min:10',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'unidades_fin' => 'required',
        ]);
        $objetivo->nombre = $request['nombre'];
        $objetivo->descripcion = $request['descripcion'];
        $objetivo->slug = Str::slug($request['nombre']);
        $objetivo->unidades_fin = $request['unidades_fin'];
        $objetivo->fecha_inicio = $request['fecha_inicio'];
        $objetivo->fecha_fin = $request['fecha_fin'];
        $objetivo->save();
        return redirect('/dashboard/ambitos/'.$ambito->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objetivo $objetivo)
    {
        $objetivo->delete();
    }
}
