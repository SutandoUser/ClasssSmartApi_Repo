<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LogedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('web')->check()){
            return redirect('/dashboard')->with('errors', 'Ya has iniciado sesión');
        }
        else{
            return $next($request);
        }
    }
}
