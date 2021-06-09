@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/ambitos-show.css') }}" rel="stylesheet">
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Objectius</li>
    </ol>
</nav>
<div class="card mb-3">
    <img src="/storage/img/banner.jpg" height="100px" style="width: 100%; object-fit:cover" height="auto" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title h3">Edició de Objectius </h5>
                {{-- <eliminar-ambito ambito-slug={{ $subObjetivos->id }}></eliminar-ambito> Componente Vue --}}
                <p class="card-text"><small class="text-black">Objectius generals</small></p>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @if($objetivos->count() > 0)
    @foreach ($objetivos as $objetivo) 
    <div class="card-ambito card text-white bg-primary ml-3 mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 h3">Objectiu - {{$loop->index+1}}
                    @if($objetivo->finalizado == true) 
                    <i class="fas fa-check-square"></i> (Completat)
                    @else
                    <i class="fas fa-spinner"></i> (En procès)
                    @endif
                </div>
                <div class="col-md-2"> 
                    <eliminar-objetivo objetivo-id={{ $objetivo->slug }}></eliminar-objetivo> {{-- Componente Vue --}}
                    @if($objetivo->finalizado == false) 
                    <a href="{{ route('dashboard.objetivos.edit', ['ambito' => $objetivo->ambitos->slug, 'objetivo' => $objetivo->slug])}}" type="button" class="btn btn-info">Editar</a>
                    @endif
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="button-ambito">
                        <a class="btn-a" href="{{ route('dashboard.objetivos.show', 
                        ['ambito' => $objetivo->ambitos->slug, 'objetivo' => $objetivo->slug])}}">Sub Objectius</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title">{{ $objetivo->nombre }}</h5>
                    <p class="card-text">{{ $objetivo->descripcion}}</p>
                </div>
                <div class="col-lg-2">
                    <img src="/storage/{{ $objetivo->imagen }}" class="img-ambito rounded">
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @else
    <h2 class="text-center mb-4">NO N'HI HAN SUB-OBJECTIUS</h2>
    @endif
    <!-- Fin Objetivos -->
</div>
<!-- Fi Modal Boostrap -->
{{ $objetivos->links() }}
@endsection