<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateSchool
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
        if (!isset($request->name) || !isset($request->state)) {
            return response()->json([
                'statusCode' => 0,
                'message' => 'An error occured! Please, try again.'
            ]);
        }
        return $next($request);
    }
}
