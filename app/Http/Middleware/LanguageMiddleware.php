<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the session has a locale set and apply it
        if ($request->session()->has('locale')) {
            app()->setLocale($request->session()->get('locale'));
        } else {
            app()->setLocale('fr');
        }

        return $next($request);
    }
}
