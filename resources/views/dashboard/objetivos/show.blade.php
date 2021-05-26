@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/ambitos-show.css') }}" rel="stylesheet">
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/dashboard/ambitos/{{ $objetivo->ambitos->slug }}">{{ $objetivo->ambitos->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $objetivo->nombre }}</li>
    </ol>
</nav>
<div class="card mb-3">
    <img src="/storage/img/banner.jpg" height="100px" style="width: 100%; object-fit:cover" height="auto" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title h3">Objectiu: {{ $objetivo->nombre }}</h5>
                {{-- <eliminar-ambito ambito-slug={{ $subObjetivos->id }}></eliminar-ambito> Componente Vue --}}
                <a href="{{ route('dashboard.objetivos.edit', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}" type="button" class="btn btn-primary">Editar Objectiu</a>
                <p class="card-text"><small class="text-muted">Última actualització: {{ $objetivo->updated_at }}</small></p>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('dashboard.sub-objetivos.create', ['ambito' => $objetivo->ambitos->slug, 'objetivo' => $objetivo->slug])}}" 
                    type="button" class="btn btn-success">Crear Sub Objectiu</a>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @foreach ($subObjetivos as $subObjetivo) 
    <div class="card-ambito card text-black bg-muted ml-3 mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">Sub Objectiu - {{$loop->index+1}}</div>
                <div class="col-md-2"> 
                    <eliminar-sub-objetivo sub-objetivo-id={{ $subObjetivo->id }}></eliminar-sub-objetivo> {{-- Componente Vue --}}
                    <a href="{{ route('dashboard.sub-objetivos.edit', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug, 'subObjetivo' => $subObjetivo->id])}}" type="button" class="btn btn-info">Editar</a>
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="button-ambito">
                        <a class="btn-a" href="{{ route('dashboard.objetivos.show', 
                        ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}">Més Informació</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title">{{ $subObjetivo->nombre }}</h5>
                    <p class="card-text">{{ $subObjetivo->descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Fin Objetivos -->

<!-- Fi Modal Boostrap -->
{{ $subObjetivos->links() }}
@endsection