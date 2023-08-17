<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // TODO: goed dat je je eigen middleware schrijft! Nog mooier
        // zou het zijn als je een aparte Role model voor Writer zou maken
        // (hoeft nu niet, maar idee voor volgend project)
        if(auth()->user()?->name !== 'Writer') {
            abort(Response::HTTP_FORBIDDEN);
        }
        
        return $next($request);
    }
}
