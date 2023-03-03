<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckout
{
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('api')->user()->id !== 1){
            return redirect('/', 403);
        } else {
            return $next($request);
        }
    }
}
