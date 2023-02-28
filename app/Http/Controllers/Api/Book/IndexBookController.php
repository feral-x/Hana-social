<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexBookController extends Controller
{
    public function __invoke(Request $request)
    {
        $books = Book::all();
        return response()->json($books);
    }
}
