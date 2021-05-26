<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ambito;
use App\Models\Objetivo;
use App\Models\SubObjetivo;
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
    public function create(Ambito $ambito, Objetivo $objetivo)
    {
        $todayDate = Carbon::now()->format('Y-m-d'); // Obtener la fecha actual
        return view('dashboard.objetivos.create', compact('ambito', 'objetivo', 'todayDate'));
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
            'nombre' => 'required|min:3',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'fecha_inicio' => 'required|date|before_or_equal:fecha_fin',
            'unidades_fin' => 'required',
            'unidad' => 'required'
        ]);
        $ruta_imagen = $request['imagen']->store('upload-objetivos', 'public');

        auth()->user()->objetivos()->create([ // Insertar los campos en la base de datos
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'slug' => $this->createSlug($request['nombre']),
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
    public function show(Ambito $ambito, Objetivo $objetivo)
    {
        $subObjetivos = SubObjetivo::where('objetivo_id', $objetivo->id)->paginate(3);
        return view('dashboard.objetivos.show', compact('subObjetivos', 'objetivo', 'ambito'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
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
        return redirect('/dashboard/ambitos/'.$ambito->slug);
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
    public function createSlug($title)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug)
    {        
        $usuario = auth()->user()->id;
        return Objetivo::select('slug')->where('slug', 'like', $slug.'%')->where('user_id', '=', $usuario)->get();
    }
}
