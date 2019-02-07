<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\PagePost;
use App\Comment;

class PageController extends Controller
{
    // show index page
    public function myPost($id){
        $page = Page::where('id', $id)->first();
        $posts = PagePost::where('page_id', $id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('comment_type', 'page_post')->get();

        return view('Page.MyPost')
                        ->with('page', $page)
                        ->with('comments', $comments)
                        ->with('posts', $posts);
    }
}
