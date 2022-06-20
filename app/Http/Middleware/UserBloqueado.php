<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBloqueado
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
        if(Auth::check() && Auth::user()->bloqueado){
            $message = 'A sua conta está bloqueada';        
            Auth::logout();     
            return redirect()->route('login')->withMessage($message);  
        }
        return $next($request);
    }
}