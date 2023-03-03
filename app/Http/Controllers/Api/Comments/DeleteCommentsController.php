<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteCommentsController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'comment_id'=> 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $user = auth('api')->user()->id;
            if($user && $user === (int)$request->user_id || $user === 1){
                Comment::where('id', $request->comment_id)->delete();
                return response()->json('delete complete');
            } else {
                return response()->json('Not allowed or not authorization');
            }
        }
    }
}
