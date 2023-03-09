<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookIndexCollection;
use App\Models\Book;
use App\Models\Category;

class GetBookByCategory extends Controller
{
    public function __invoke($category)
    {
        $cat = Category::where('title', $category)->first();
        $books = $cat->books()->get();
        if($books){
            return BookIndexCollection::collection($books);
        } else {
            return response()->json('no data');
        }
    }
}
