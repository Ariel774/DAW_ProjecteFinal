@extends('layouts.dashboard')
@section('content')
<!-- Navegador -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/ambitos/{{ $ambito->slug }}">{{ $ambito->nombre }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.objetivos.show', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}">{{ $objetivo->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Informació Sub-Objectiu</li>
    </ol>
</nav>
<!-- Navegador -->
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Informació SubObjectiu: {{ $subObjetivo->nombre }}</h1>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Propietat</th>
            <th scope="col">Informació</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Àmbit</td>
            <td>{{ $ambito->nombre }}</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Objectiu</td>
            <td>{{ $objetivo->nombre}}</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Data fi</td>
            <td>{{ $objetivo->fecha_fin}}</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Unitats Actuals</td>
            <td>{{ $objetivo->unidades_actuales }} {{ $objetivo->unidad }} </td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Hora a relizar</td>
            <td>{{ $subObjetivo->hora_inicio }} - {{ $subObjetivo->hora_fin }} </td>
          </tr>
        </tbody>
      </table>
      <a href="{{ route('dashboard.objetivos.show', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}" type="button" class="btn btn-info btn-lg btn-block">
        ACEPTAR
      </a>
</div>

@endsection