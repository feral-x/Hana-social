<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckout
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('api')->user();
        if($user && $user->id !== 1){
            return \response()->json('denied', 403);
        }
        elseif ($user === null) {
            return \response()->json('not authorization', 401);
        }
        else {
            return $next($request);
        }
    }
}
