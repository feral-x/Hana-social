<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class GetBookController extends Controller
{
    public function __invoke(Request $request)
    {
        $book = Book::where('id', $request->id)->first();
        $tags_list = $book->tags()->get();
        $categories = $book->categories()->get();
        $uploader = User::where('id', $book->uploader)->first()->toArray();
        $pages = $book->pages()->get()->toArray();
        $finall_data['book'] = $book->toArray();
        $finall_data['book']['tags'] = $tags_list->toArray();
        $finall_data['book']['categories'] = $categories->toArray();

        foreach ($finall_data['book']['tags'] as $key => $datum){
            unset($finall_data['book']['tags'][$key]['pivot']);
        }
        foreach ($finall_data['book']['categories'] as $key => $datum){
            unset($finall_data['book']['categories'][$key]['pivot']);;
        }
        foreach ($uploader as $key=>$item){
            if($key != "id" && $key != "name" && $key != "user_avatar_url"){
                unset($uploader[$key]);
            }
        }
        foreach ($pages as $keys=>$item){
            foreach ($item as $key => $data){
                if($key == "created_at" || $key == "updated_at" || $key == "book_id"){
                    unset($pages[$keys][$key]);
                }
            }
        }
        $finall_data['book']['uploader'] = $uploader;
        $finall_data['book']['pages'] = $pages;
        return response()->json($finall_data);
    }
}
