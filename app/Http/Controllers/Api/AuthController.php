<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Passport\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min: 8'
        ]);
        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        }
        $client = Client::where('id', 2)->first();
        $data = [
            'grant_type'=>'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username'=>$request->email,
            'password'=>$request->password,
            'scope'=>"*"
        ];
        $token = Request::create('/oauth/token', 'post', $data);
        return app()->handle($token);
    }


    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|string|max:255|email|',
            'password' => 'required | between:8, 255 | confirmed'
        ]);
        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $request['password'] = Hash::make($request['password']);
            $user = User::create($request->all());
        }
        if (!$user){
            return response()->json(['success'=>false, 'message'=> 'user already exists'], 500);
        }
        return response()->json(['success'=> true, 'message'=> 'Registration success'], 200);
    }
}
