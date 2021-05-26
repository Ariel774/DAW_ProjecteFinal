<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RevisarAmbitos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->ambitos->isEmpty()) { // Comprobamos si tiene registros
            return redirect('/dashboard/ambitos/create');
        } 
        return $next($request);
    }
}
