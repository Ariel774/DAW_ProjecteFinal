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
                <button class="btn btn-primary show-modal" data-toggle="modal" data-target="#ambitModal">Editar</button>
                <p class="card-text">{{ $objetivo->descripcion }}</p>
                <p class="card-text"><small class="text-muted">Última actualització: {{ $objetivo->updated_at }}</small></p>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('dashboard.sub-objetivos.create', ['ambito' => $objetivo->ambitos->slug, 'objetivo' => $objetivo->slug])}}" 
                    type="button" class="btn btn-success">Crear Sub Objectiu</a>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @foreach ($subObjetivo as $sub) 


    @endforeach
    <!-- Fin Objetivos -->

<!-- Fi Modal Boostrap -->
{{ $subObjetivos->links() }}
@endsection