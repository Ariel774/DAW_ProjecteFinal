<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="limiter">
            <div class="container-welcome100">
                <div style="margin-bottom: 10%">
                    <div class="wrap-welcome100">
                        <h1>Benvingut!!</h1>
                    </div>
                    <div class="wrap-welcome100">
                        @if (Route::has('login'))
                            <div class="hidden">
                                @auth
                                    <a href="{{ route('dashboard.home') }}" class="btn btn-white btn-animate">Go to Home</a>
                                @else
                                <div></div>
                                    <a href="{{ route('login') }}" class="btn btn-white btn-animate">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-white btn-animate" >Registrar-se</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
