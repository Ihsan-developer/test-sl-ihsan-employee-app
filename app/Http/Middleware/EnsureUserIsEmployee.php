<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->isEmployee()) {
            abort(403, 'Unauthorized. Employee access required.');
        }

        // Ensure employee has an employee record
        if (!$request->user()->employee) {
            abort(403, 'No employee record found. Contact administrator.');
        }

        return $next($request);
    }
}
