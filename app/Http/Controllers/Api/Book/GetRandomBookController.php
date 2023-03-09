<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Models\Book;

class GetRandomBookController extends Controller
{
    public function __invoke()
    {
        $book = Book::inRandomOrder()->first();
        if ($book){
            return response()->json(['book_id' => $book->id]);
        } else {
            return response()->json('not found', 404);
        }
    }
}
