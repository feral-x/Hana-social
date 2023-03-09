<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookIndexCollection;
use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class GetBookBySearch extends Controller
{
    public function __invoke(Request $request)
    {
        $string = $request->search;
        $books = Book::where('title', 'like', '%'.$string.'%')->get();
        if($books){
            return BookIndexCollection::collection($books);
        } else {
            $tag = Tag::where('title', 'like', '%'.$string.'%')->first();
            if ($tag){
                $books = $tag->books()->get();
                if ($books){
                    return BookIndexCollection::collection($books);
                } else {
                    return response()->json('Nothing find');
                }
            }
        }
    }
}
