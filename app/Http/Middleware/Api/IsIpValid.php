<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsIpValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $valid_ips = ['127.0.0.1','127.0.0.1:8000'];
         if(!in_array($request->ip(),$valid_ips)){
            return response('invalid ip',422);
         }
        return $next($request);
    }
}
