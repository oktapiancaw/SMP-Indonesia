<?php

namespace App\Http\Middleware;

use Closure;

class IsWali
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
        if (auth()->user()->level == 1) {
            return $next($request);
        }
        return redirect('/home')->with(['error' => "Kamu tidak di perbolehkan masuk"]);
    }
}
