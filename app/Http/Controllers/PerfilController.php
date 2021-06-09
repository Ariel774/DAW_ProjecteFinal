<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = auth()->user()->perfil()->first();
        return view('dashboard.perfil.index', compact('perfil'));                     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        // Validar
        // dd($request->all());
        $data = request()->validate([
            'nombre' => 'required',
            'biografia' => 'required'
        ]);

        // Si el usuario sube una imagen

        if($request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');
            $imagen = '/public/'.$perfil->imagen;   
            Storage::delete($imagen);
            auth()->user()->perfil()->update([
                'biografia' => $data['biografia'],
                'imagen' => $ruta_imagen 
            ]);
        }

        auth()->user()->name = $data['nombre']; // Campo nombre guardado
        auth()->user()->save(); 
 
        // --- Eliminamos información adicional
        unset($data['nombre']);
        // --- Fin información 
        
        // Array_Merge junta dos arrays o más
        auth()->user()->perfil()->update([
            'biografia' => $data['biografia'],
        ]);
        return redirect()->action([PerfilController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
