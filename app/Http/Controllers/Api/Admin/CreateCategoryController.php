<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required'
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors()->all());
        } else {
            $tag = Category::firstOrCreate(['title' => $request->category]);
            if ($tag->wasRecentlyCreated){
                return response()->json('category created');
            } else {
                return response()->json('category already exist');
            }
        }
    }
}
