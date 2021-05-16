@extends('layouts.dashboard')
@section('content')
<div class="card mb-3">
    <img src="/storage/img/banner.jpg" height="100px" style="width: 100%; object-fit:cover" height="auto" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title h3">Àmbit: {{ $ambito->nombre }}</h5>
                <p class="card-text">{{ $ambito->descripcion }}</p>
                <p class="card-text"><small class="text-muted">Última actualització: {{ $ambito->updated_at }}</small></p>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary">Crear Objectiu</button>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    <div class="card text-white bg-primary m-2">
        <div class="card-header">
            Header
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="col-1">
                        <img src="/storage/img/banner.jpg" width="auto" height="100px" class="img-responsive rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card text-white bg-secondary m-2">
        <div class="card-header">
            Header
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="col-1">
                        <img src="/storage/img/banner.jpg" width="auto" height="100px" class="img-responsive rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Objetivos -->
</div>

@endsection