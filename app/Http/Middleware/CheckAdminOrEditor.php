<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminOrEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is logged in and has the admin or editor role     
        if (Auth::check() && (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))) {
            return $next($request);
        }

        // Redirect to a 403 Forbidden page
        //abort(403, 'Unauthorized'); 
        
        // Redirect to the unauthorized page
        return redirect()->route('unauthorized');
    }
}
