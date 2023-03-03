<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResources;
use App\Models\Comment;

class GetCommentsController extends Controller
{
    public function __invoke($id)
    {
        $comments = Comment::where('book_id', $id)->get()->reverse()->values();
        if($comments){
            foreach ($comments as $comment){
                $comment['user'] = $comment->get_users()->first();
            }
            return CommentResources::collection($comments);
        } else {
            return response()->json('Book not found');
        }
    }
}
