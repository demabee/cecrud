<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthChecker
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
        if(!session()->has('LoggedEmployee')){
            return redirect('login')->with('message', 'You must login.');
        }
        return $next($request);
    }
}
