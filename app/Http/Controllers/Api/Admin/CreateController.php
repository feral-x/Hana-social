<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\CategoryBook;
use App\Models\Page;
use App\Models\Tag;
use App\Models\TagBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required',
            'original_title'=> 'required',
            'prev_img'=> 'required',
            'pages'=> 'required',
            'tags'=> 'required',
            'categories'=> 'required',
        ]);
        if ($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $book = Book::firstOrCreate(
                ['title' => $request->title,
                 'original_title' => $request->original_title
                ],
                ['uploader' => auth('api')->user()->id]
            );
            if($book->wasRecentlyCreated){
                if ($request->hasFile('prev_img')) {
                    foreach ($request->prev_img as $page) {
                        $page->store("books/".$book->id."/prev_img", 'public');
                        $filename = $page->hashName();
                        $book->preview_img = "storage/books/".$book->id."/prev_img/".$filename;
                        $book->save();
                    }
                } else {
                    return response()->json('preview error');
                }

                if ($request->hasFile('pages')) {
                    foreach ($request->file('pages') as $key=>$page){
                        $pageModel = new Page();
                        $page->store("public/books/".$book->id."/pages/");
                        $filename = $page->hashName();
                        $pageModel->url = "storage/books/".$book->id."/pages/".$filename;
                        $pageModel->book_id = $book->id;
                        $pageModel->chapter = 1;
                        $pageModel->volume = 1;
                        $pageModel->page = $key + 1;
                        $pageModel->save();
                    }
                } else {
                    return response()->json('pages error');
                }

                foreach ($request->categories as $item){
                    $category = new CategoryBook();
                    $category->category_id = $item;
                    $category->book_id = $book->id;
                    $category->save();
                }

                foreach ($request->tags as $item){
                    $tag = new TagBook();
                    $tag->tag_id = $item;
                    $tag->book_id = $book->id;
                    $tag->save();
                }

                return response()->json('book was created');

            } else {
                return response()->json('book already exist');
            }

        }
    }
}
