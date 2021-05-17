<?php

namespace App\Http\Controllers;

use App\Models\Ambito;
use App\Models\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if($curRowsDB > 0) { // Comprobamos si existen registros al respecto.
            for ($i = $curRowsDB; $i <= $nRows; $i++) {
                request()->validate([ // Validaciones
                    'ambito_'.$i => 'required|min:6',
                    'descripcion_'.$i => 'required',
                ]);
                auth()->user()->ambitos()->create([ // Insertar los campos en la base de datos
                    'nombre'=> $request['ambito_'.$i],
                    'descripcion'=> $request['descripcion_'.$i]
                ]);
            }
        } else { // Si no existen los creamos todos
            
            for ($i = 0; $i <= $nRows; $i++) {
                request()->validate([ // Validaciones
                    'ambito_'.$i => 'required|min:3',
                    'descripcion_'.$i => 'required',
                ]);
                auth()->user()->ambitos()->create([ // Insertar los campos en la base de datos
                    'nombre'=> $request['ambito_'.$i],
                    'descripcion'=> $request['descripcion_'.$i]
                ]);
            }
            return redirect('dashboard/home');
        }
        return view('dashboard.home');
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

        $objetivos = Objetivo::where('user_id', $usuario)->where('ambito_id', $ambito->id)->paginate(3);
        return view('dashboard.ambitos.show', compact('ambito', 'objetivos'));
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
        dd($request->all());
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
}
