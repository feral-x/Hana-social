<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateTagController extends Controller
{
    public function __invoke(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'tag' => 'required'
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors()->all());
        } else {
            $tag = Tag::firstOrCreate(['title' => $request->tag]);
            if ($tag->wasRecentlyCreated){
                return response()->json('tag created');
            } else {
                return response()->json('tag already exist');
            }
        }
    }
}
