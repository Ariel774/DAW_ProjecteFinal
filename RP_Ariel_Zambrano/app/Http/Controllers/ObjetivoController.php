<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
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
    public function edit(Objetivo $objetivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objetivo $objetivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objetivo $objetivo)
    {
        //
    }
}
