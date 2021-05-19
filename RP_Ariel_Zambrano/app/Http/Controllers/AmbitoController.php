<?php

namespace App\Http\Controllers;

use App\Models\Ambito;
use App\Models\Objetivo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AmbitoController extends Controller
{
    public function __construct()
    {
        // proteger nuestros enlaces para que no se puedan conectar a menos que estén logeados, EXCEPTO show
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambitos = Auth::user()->ambitos; // Guardamos el array de recetas obtenido, Recetas es el hasMany del modelo
        return view('dashboard.home',compact('ambitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ambitos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Consultem les rows que hi ha actualment en la nostra base de dades.
        $curRowsDB = auth()->user()->ambitos()->where('user_id', '=', auth()->user()->id)->count();
        $nRows = $request['nRows']; // Número de campos a guardar
        $data = $request->validate([
            "ambitos"  => 'required|array|min:3',
            "ambitos.*" => 'required|min:3',
            "descripcion"  => 'required|array|min:3',
            "descripcion.*"  => 'required',
        ]);
        if($curRowsDB > 0) { // Comprobamos si existen registros al respecto.
            for ($i = $curRowsDB; $i < $nRows; $i++) {
                auth()->user()->ambitos()->create([ // Insertar los campos en la base de datos
                    'nombre'=> $data['ambitos'][$i],
                    'descripcion'=> $data['descripcion'][$i],
                    'slug'=> $this->createSlug($data['ambitos'][$i])
                ]);
            }
            
        } else { // Si no existen los creamos todos 
            for ($i = 0; $i <= $nRows; $i++) {
                auth()->user()->ambitos()->create([ // Insertar los campos en la base de datos
                    'nombre'=> $data['ambitos'][$i],
                    'descripcion'=> $data['descripcion'][$i],
                    'slug'=> $this->createSlug($data['ambitos'][$i])
                ]);
            }
        }
        return redirect()->action([AmbitoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function show(Ambito $ambito)
    {        
        $usuario = auth()->user()->id;
        $ambitosTotales = auth()->user()->ambitos()->where('user_id', '=', $usuario)->count();
        $objetivos = Objetivo::where('user_id', $usuario)->where('ambito_id', $ambito->id)->paginate(3);
        return view('dashboard.ambitos.show', compact('ambito', 'objetivos', 'ambitosTotales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambito $ambito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambito $ambito)
    {
        request()->validate([ // Validaciones
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $ambito->nombre = $request['nombre'];
        $ambito->descripcion = $request['descripcion'];
        $ambito->slug = $this->createSlug($request['nombre']);
        $ambito->save();
        return redirect()->action([AmbitoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambito $ambito)
    {
        // Eliminar la receta
        $ambito->delete();
        return redirect()->action([AmbitoController::class, 'index']);
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
        return Ambito::select('slug')->where('slug', 'like', $slug.'%')->where('user_id', '=', $usuario)->get();
    }
}
