<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class NeedsJsonRequest
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
        return $request->isJson()
            ? $next($request)
            : new JsonResponse(['error' => 'Request has to be a JSON object'], 400);
    }
}
