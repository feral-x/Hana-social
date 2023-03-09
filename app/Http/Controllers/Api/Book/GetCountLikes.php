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

class GetCountLikes extends Controller
{
    public function __invoke(Request $request)
    {
        $count = LoveBook::where('book_id', $request->book_id)->get()->count();
        $user = auth('api')->user()->id;

        if($user){
            $is_you = LoveBook::where('user_id', $user)->where('book_id', $request->book_id)->first();
            if($is_you){
                if ($count > 0) {
                    return response()->json(['count' => $count, 'is_you' => 1]);
                } else {
                    return response()->json(['count' => 0, 'is_you' => 1]);
                }
            } else {
                if ($count > 0) {
                    return response()->json(['count' => $count, 'is_you' => 0]);
                } else {
                    return response()->json(['count' => 0, 'is_you' => 0]);
                }
            }
        } else {
            return response()->json([], 403);
        }
    }
}
