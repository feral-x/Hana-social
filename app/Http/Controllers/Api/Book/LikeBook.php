<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookIndexCollection;
use App\Models\Book;
use App\Models\Category;
use App\Models\LoveBook;
use App\Models\Tag;
use Illuminate\Http\Request;

class LikeBook extends Controller
{
    public function __invoke(Request $request)
    {

        $user = auth('api')->user()->id;

        if($user){
            $like_model = LoveBook::where('user_id', $user)->where('book_id', $request->book_id)->first();
        }

        if ($user && $like_model){
            $like_model->delete();
            return response()->json('dislike complete');
        } elseif ($user){
            $like_model = new LoveBook();
            $like_model->user_id = $user;
            $like_model->book_id = $request->book_id;
            $like_model->save();
            return response()->json('like complete');
        }
    }
}
