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
   Route::get('/book/{id}/comments', \App\Http\Controllers\Api\Comments\GetCommentsController::class);
   Route::post('/book/{id}/comments', \App\Http\Controllers\Api\Comments\PostCommentsController::class);
   Route::delete('/book/{id}/comments', \App\Http\Controllers\Api\Comments\DeleteCommentsController::class);

   Route::post('/search', \App\Http\Controllers\Api\Book\GetBookBySearch::class);

   Route::get('/random', \App\Http\Controllers\Api\Book\GetRandomBookController::class);
   Route::get('/get_categories', \App\Http\Controllers\Api\Categories\GetAllCategories::class);
   Route::get('/get_tags', \App\Http\Controllers\Api\Tags\GetAllTags::class);

   Route::post('/tags/{tag}', \App\Http\Controllers\Api\Book\GetBookByTag::class);
   Route::post('/categories/{category}', \App\Http\Controllers\Api\Book\GetBookByCategory::class);

   Route::post('/likes', \App\Http\Controllers\Api\Book\LikeBook::class);
   Route::post('/get_likes', \App\Http\Controllers\Api\Book\GetCountLikes::class);

   Route::post('/users/me', \App\Http\Controllers\Api\GetMyIdController::class);
});

Route::group(['middleware' => 'isAdmin'], function (){
   Route::post('/guardian/checkout', \App\Http\Controllers\Api\Admin\CheckoutController::class);
   Route::post('/guardian/create', \App\Http\Controllers\Api\Admin\CreateController::class);
   Route::post('/guardian/create_tag', \App\Http\Controllers\Api\Admin\CreateTagController::class);
   Route::post('/guardian/create_category', \App\Http\Controllers\Api\Admin\CreateCategoryController::class);
   Route::get('/guardian/get_tags', \App\Http\Controllers\Api\Admin\GetTagsController::class);
   Route::get('/guardian/get_categories', \App\Http\Controllers\Api\Admin\GetCategoriesController::class);
});
