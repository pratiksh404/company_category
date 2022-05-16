<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $access_token = getallheaders()['api_key'];
        return $access_token == config('adminetic.API_KEY', env('API_KEY', 'BA673A414C3B44C98478BB5CF10A0F832574090C')) ? $next($request) : response()->json(['message' => 'Invalid Token'], 401);
    }
}
