<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class CheckoutTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json(['message'=> 'ok']);
    }
}
