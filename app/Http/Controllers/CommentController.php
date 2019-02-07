<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    // insert user post comment
    public function addComment_Userpost(Request $request){
        $comment = new Comment();
        $comment->comment_type = 'user_post';
        $comment->comment = $request->commentData;
        $comment->user_id = $request->user_id;
        $comment->user_name = $request->user_name;
        $comment->post_id = $request->post_id;
        $comment->date = date("F j, Y, g:i a");
        $comment->save();

        $request->session()->flash('success_message', 'Commented');
        return redirect()->route('viewuserpost', ['id' => $request->post_id]);
    }

    // insert page post comment
    public function addComment_Pagepost(Request $request){
        $comment = new Comment();
        $comment->comment_type = 'page_post';
        $comment->comment = $request->commentData;
        $comment->user_id = $request->user_id;
        $comment->user_name = $request->user_name;
        $comment->post_id = $request->post_id;
        $comment->date = date("F j, Y, g:i a");
        $comment->save();

        $request->session()->flash('success_message', 'Commented');
        return redirect()->route('viewpost', ['page_id'=>$request->page_id, 'post_id'=>$request->post_id]);
    }
}
