<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SelectDivisionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(user()->divisions->count() > 1 and !session()->exists('user.division'))
            return redirect()->route('session.select-division.get');

        if(user()->divisions->count() == 1)
            session('user.division', user()->divisions->first()->id);

        return $next($request);
    }
}
