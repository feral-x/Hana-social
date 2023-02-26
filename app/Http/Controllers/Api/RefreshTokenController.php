<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class RefreshTokenController extends Controller
{
    public function __invoke(Request $request){
        $validator = Validator::make($request->all(), [
            'refresh_token' => 'required',
        ]);
        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $client = Client::where('password_client', 1)->first();
            $response = Request::create('/oauth/token', 'post', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $request->refresh_token,
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'scope' => '*',
            ]);
            $json = app()->handle($response);
            return $json;
        }
    }
}
