<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetMyIdController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth('api')->user()->id;
        if($user){
            return response()->json($user);
        }
        return response()->json('not authorization',401);
    }
}
