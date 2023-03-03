<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Models\Book;

class GetBookController extends Controller
{
    public function __invoke($id)
    {
            $book = Book::where('id', $id)->first();
            if ($book){
                $data['book'] = $book;
                $data['book']['tags'] = $book->tags()->get();
                $data['book']['categories'] = $book->categories()->get();
                $data['book']['pages'] = $book->pages()->get();
                $data['book']['uploader'] = $book->uploader()->get();

                return BookCollection::collection($data);
            } else {
                return response()->json('not found', 404);
            }
        }
}
