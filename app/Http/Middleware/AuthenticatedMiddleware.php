<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedMiddleware
{   
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('web')->check() === false){
            return redirect('/login')->with('errors', 'Por favor inicia sesión para continuar');
        }
        else{
            return $next($request);
        }
    }
}
