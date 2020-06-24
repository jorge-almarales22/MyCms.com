<?php

namespace App\Http\Middleware;

use Closure, Route;

class Permissions
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
        if(auth()->user()->role == 1 && kvfj(auth()->user()->permissions, Route::currentRouteName()) == true)
        {
            return $next($request);
        }else{
            return redirect()->route('home')->with('status', '! Lo sentimos no tienes los permisos necesarios para pasar !');
        }
        
    }
}
