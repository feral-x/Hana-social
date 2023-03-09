<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookIndexCollection;
use App\Models\Book;
use App\Models\Tag;

class GetBookByTag extends Controller
{
    public function __invoke($tag)
    {
        $tg = Tag::where('title', $tag)->first();
        $books = $tg->books()->get();
        if($books){
            return BookIndexCollection::collection($books);
        } else {
            return response()->json('no data');
        }
    }
}
