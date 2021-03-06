<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tarea;
use App\Models\Ambito;
use App\Models\Objetivo;
use Carbon\CarbonPeriod;
use App\Models\Calendario;
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
        $todayHour = Carbon::now()->format('H:i:m');

        return view('dashboard.sub-objetivos.create', compact('ambito', 'objetivo', 'todayHour'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ambito $ambito, Objetivo $objetivo)
    {
        if(($request['hora_inicio'] && $request['hora_fin']) == NULL) {
            $request['hora_inicio'] = '00:00'; 
            $request['hora_fin'] = '00:00'; 
        }
        request()->validate([ // Validaciones
            'nombre' => 'required',
            'unidades_realizar' => 'required',
            'dias' => 'required',
            'color' => 'required',
            'hora_fin' => 'date_format:H:i|after_or_equal:hora_inicio',
            'hora_inicio' => 'date_format:H:i|before_or_equal:hora_fin',
        ]);
        // Si la hora es 00:00 lo dejamos en NULL
        if($request['hora_inicio'] == '00:00' && $request['hora_fin'] == '00:00') {
            $request['hora_inicio'] = NULL; 
            $request['hora_fin'] = NULL; 
        }
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
        $SubObjetivo_id = SubObjetivo::latest()->first()->id; // Obtener el ??ltimo ID creado 
        // Creamos el calendario
        auth()->user()->calendario()->create([
            'title' => $request['nombre'],
            'start' => $objetivo->fecha_inicio,
            'end' => $objetivo->fecha_fin,
            'daysOfWeek' => $dias,
            'startTime' => $request['hora_inicio'],
            'endTime' => $request['hora_fin'],
            'startRecur' => $objetivo->fecha_inicio,
            'endRecur' => $objetivo->fecha_fin,
            'color' => $request['color'],
            'sub_objetivo_id' => $SubObjetivo_id,
            'objetivo_id' => $objetivo->id
        ]);
        // M??todo para crear las tareas
        $startDate=$objetivo->fecha_inicio;
        $endDate=$objetivo->fecha_fin;
        // Funci??n para guardar los d??as de la semana segun la fecha inicio y fin
        $period = CarbonPeriod::create($startDate, $endDate)->filter(
            fn ($date) => in_array($date->dayOfWeek, $request['dias']),
        );
        foreach ($period as $date) {
            auth()->user()->tareas()->create([
                'titulo' => $objetivo->nombre,
                'subtitulo' => $request['nombre'],
                'unidades_hechas' => 0,
                'unidades_realizar' => $request['unidades_realizar'],
                'fecha_inicio' => $objetivo->fecha_inicio,
                'fecha_fin' => $objetivo->fecha_fin,
                'fecha_tarea' => $date->format('Y-m-d'),
                'hora_inicio' => $request['hora_inicio'],
                'hora_fin' => $request['hora_inicio'],
                'sub_objetivo_id' => $SubObjetivo_id,
                'objetivo_id' => $objetivo->id,
            ]);    
        }
        return redirect('/dashboard/ambitos/'.$ambito->slug.'/objetivos/'.$objetivo->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function show(Ambito $ambito, Objetivo $objetivo, SubObjetivo $subObjetivo)
    {
        return view('dashboard.sub-objetivos.show', compact('objetivo', 'ambito', 'subObjetivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambito $ambito, Objetivo $objetivo, SubObjetivo $subObjetivo)
    {
        $calendario = Calendario::where('sub_objetivo_id', $subObjetivo->id)->first(); // Devolver un Objecto
        return view('dashboard.sub-objetivos.edit', compact('objetivo', 'ambito', 'subObjetivo', 'calendario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambito $ambito, Objetivo $objetivo, SubObjetivo $subObjetivo)
    {
        if(($request['hora_inicio'] && $request['hora_fin']) == NULL) {
            $request['hora_inicio'] = '00:00'; 
            $request['hora_fin'] = '00:00'; 
        }
        request()->validate([ // Validaciones
            'nombre' => 'required',
            'unidades_realizar' => 'required',
            'dias' => 'required',
            'color' => 'required',
            'hora_fin' => 'after_or_equal:hora_inicio',
            'hora_inicio' => 'before_or_equal:hora_fin',
        ]);
        $dias = "";
        $arrayDay = $request['dias'];
        foreach ($arrayDay as $dia) {
            $dias .= $dia.",";
        }
        $dias = substr($dias, 0, -1); // Borramos la coma final

        // Si la hora es 00:00 lo dejamos en NULL
        if($request['hora_inicio'] == '00:00' && $request['hora_fin'] == '00:00') {
            $request['hora_inicio'] = NULL; 
            $request['hora_fin'] = NULL; 
        }
        $subObjetivo->nombre = $request['nombre'];
        $subObjetivo->unidades_realizar = $request['unidades_realizar'];
        $subObjetivo->dias = $dias;
        $subObjetivo->descripcion =  $request['descripcion'] ?? '';
        $subObjetivo->hora_inicio = $request['hora_inicio'];
        $subObjetivo->hora_fin = $request['hora_fin'];
        $subObjetivo->objetivo_id = $objetivo->id;
        $subObjetivo->save();
        //Actualizamos las tareas
        $tareasArray = Tarea::where('sub_objetivo_id', $subObjetivo->id)->get(); // Devolver un Array
        foreach ($tareasArray as $tareas) {
            $tareas->delete();
        }

        $period = CarbonPeriod::create($objetivo->fecha_inicio, $objetivo->fecha_fin)->filter(
            fn ($date) => in_array($date->dayOfWeek, $request['dias'])
        );
        foreach ($period as $date) {
            auth()->user()->tareas()->create([
                'titulo' => $objetivo->nombre,
                'subtitulo' => $subObjetivo->nombre,
                'unidades_hechas' => 0,
                'unidades_realizar' => $subObjetivo->unidades_realizar,
                'fecha_inicio' => $objetivo->fecha_inicio,
                'fecha_fin' => $objetivo->fecha_fin,
                'fecha_tarea' => $date->format('Y-m-d'),
                'hora_inicio' => $subObjetivo->hora_inicio,
                'hora_fin' => $subObjetivo->hora_fin, 
                'sub_objetivo_id' => $subObjetivo->id,
                'objetivo_id' => $objetivo->id,
            ]);    
        }
        // Actualizaci??n del calendario
        $calendario = Calendario::where('sub_objetivo_id', $subObjetivo->id)->first(); // Devolver un Objecto
        $calendario->startTime = $request['hora_inicio'];
        $calendario->endTime = $request['hora_fin'];
        $calendario->daysofWeek = $dias;
        $calendario->color = $request['color'];
        $calendario->save();

        return redirect('/dashboard/ambitos/'.$ambito->slug.'/objetivos/'.$objetivo->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubObjetivo  $subObjetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubObjetivo $subObjetivo)
    {
        $subObjetivo->delete();
    }
}
