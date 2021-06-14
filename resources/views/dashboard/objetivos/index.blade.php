@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/ambitos-show.css') }}" rel="stylesheet">
<link href="{{ asset('css/spinner.css') }}" rel="stylesheet">
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
    <livesearch-objetivo></livesearch-objetivo>
</div>
@endsection