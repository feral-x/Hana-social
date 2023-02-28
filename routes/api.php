<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('refresh', \App\Http\Controllers\Api\RefreshTokenController::class);
Route::get('checkout_token', \App\Http\Controllers\Api\CheckoutTokenController::class)->middleware('auth:api');;


Route::group([], function (){
   Route::get('/book/{id}', \App\Http\Controllers\Api\Book\GetBookController::class);
   Route::get('/books', \App\Http\Controllers\Api\Book\IndexBookController::class);
});
