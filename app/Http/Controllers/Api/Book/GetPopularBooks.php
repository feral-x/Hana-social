<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookIndexCollection;
use App\Models\Book;
use App\Models\Category;
use App\Models\LoveBook;
use Illuminate\Support\Facades\DB;

class GetPopularBooks extends Controller
{
    public function __invoke()
    {
        $books = LoveBook::select('book_id', DB::raw('COUNT(*) as likes'))
            ->groupBy('book_id')
            ->orderByDesc('likes')
            ->limit(5)
            ->get();
        foreach ($books as $key => $book){
            $books[$key] = Book::where('id', $book['book_id'])->first();
        }
        return BookIndexCollection::collection($books);
    }
}
