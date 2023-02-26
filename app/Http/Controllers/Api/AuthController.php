<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $user = User::where('email', $request->email)->first();
            if($user){
                $validUser = Hash::check($request['password'], $user->password);
                if($validUser){
                    $client = Client::where('password_client', 1)->first();
                    $response = Request::create('/oauth/token', 'post', [
                        'grant_type' => 'password',
                        'client_id' => $client->id,
                        'client_secret' => $client->secret,
                        'username' => $request->email,
                        'password' => $request->password,
                        'scope' => '*',
                    ]);
                    $json = app()->handle($response);
                    return $json;
                } else {
                    return response()->json(['message'=> 'Wrong password or email'], 500);
                }
            } else {
                return response()->json(['message'=> 'Wrong password or email'], 500);
            }
        }
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
