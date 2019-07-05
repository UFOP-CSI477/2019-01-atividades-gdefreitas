<?php

namespace App\Http\Middleware;

use Closure;

class CheckPacientUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->type == 2){
            return redirect('/operador/home');
        }
        if(auth()->user()->type == 1){
            return redirect('/administrador/home');
        }

        return $next($request);
    }
}
