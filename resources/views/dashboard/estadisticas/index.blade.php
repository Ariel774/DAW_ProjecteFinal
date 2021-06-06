@extends('layouts.dashboard') @section('styles')
<link href="{{ asset('css/estadisticas.css') }}" rel="stylesheet">
@endsection @section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Estadistiques</h2>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <div class="counter">
                <i class="fas fa-tasks fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="100" data-speed="1500">100</h2>
                <p class="count-text ">Objectius totals</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fas fa-user-clock fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">20</h2>
                <p class="count-text ">Objectius pendents</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="far fa-check-circle fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">30</h2>
                <p class="count-text ">Objectius completats</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection