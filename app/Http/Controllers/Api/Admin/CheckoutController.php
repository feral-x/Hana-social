<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        $user = auth('api')->user();
        if ($user && $user->id === 1){
            return response()->json('access', 200);
        } else {
            return response()->json('denied', 403);
        }
    }
}
