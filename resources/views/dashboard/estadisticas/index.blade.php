@extends('layouts.dashboard') @section('styles')
<link href="{{ asset('css/estadisticas.css') }}" rel="stylesheet">
@endsection @section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Estadístiques</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <div class="counter">
                <i class="fas fa-tasks fa-2x"></i>
                <h2 class="timer count-title count-number">{{ $objetivosTotales }}</h2>
                <p class="count-text ">Objectius totals</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fas fa-user-clock fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">{{ $objetivosPendientes }}</h2>
                <p class="count-text ">Objectius pendents</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="far fa-check-circle fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">{{ $objetivosHechos }}</h2>
                <p class="count-text ">Objectius completats</p>
            </div>
        </div>
    </div>
</div>
<div class="container mt-2">
    <table class="table table-hover table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom Objectiu</th>
                <th scope="col">Data Inici/fi</th>
                <th scope="col">Data fi</th>
                <th scope="col">Unitats Realitzades</th>
                <th scope="col">Completat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetivos as $objetivo)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{ $objetivo->nombre }}</td>
                    <td>{{ date('d-m-Y', strtotime($objetivo->fecha_inicio)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($objetivo->fecha_fin)) }}</td>

                    <td>{{ $objetivo->unidades_actuales}}/{{ $objetivo->unidades_fin }}</td>
                    <td>@if($objetivo->finalizado == true) 
                        <i class='fas fa-check'></i>
                        @else <i class="fas fa-times"></i>
                        @endif
                    </td>                        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $objetivos->links() }}
@endsection