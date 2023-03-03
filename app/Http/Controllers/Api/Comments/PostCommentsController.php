<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;

class PostCommentsController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'body'=> 'required'
        ]);

        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        } else {
            $user_id = auth('api')->user()->id;
            if ($user_id){
                $comment = new Comment();
                $comment->user_id = $user_id;
                $comment->book_id = $id;
                $comment->body = $request->body;
                $comment->save();
                return response()->json('comment created!');
            } else {
                return response()->json('You are not login!', 401);
            }
        }
    }
}
