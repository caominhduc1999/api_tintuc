<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->article_id = $request->article_id;
        $comment->comment = $request->comment;

        if ($comment->save()){
            return response()->json([
                'data' => $comment->load('user')
            ], 201);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again ! !',
                'status_code'   =>  500
            ], 500);
        }
    }
}
