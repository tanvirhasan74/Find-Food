<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagePost;
use App\Page;
use App\Http\Requests\PagePostRequest;
use App\Comment;
use App\timeline;

class PagePostController extends Controller
{
    // insert post
    public function insertPost(PagePostRequest $request){
        $post = new PagePost();
        $post->page_id = $request->page_id;
        $post->title = $request->title;
        $post->post = $request->post_data;
        $post->downvote = 0;
        $post->upvote = 0;
        $post->img1 = null;
        $post->img2 = null;
        $post->img3 = null;
        $post->date = date("F j, Y, g:i a");
        $post->save();

        // 3 post picture
        $lastID = PagePost::find($post->id);
        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $name = $post->id.'_img1' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img1 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $name = $post->id.'_img2' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img2 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img3')) {
            $image = $request->file('img3');
            $name = $post->id.'_img3' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img3 = $name;
            $lastID->save();
        }
        $request->session()->flash('success_message', 'Posted submitted Successsfully');



        $info=(object)['page_user'=>'page', 'page_user_id'=>$request->page_id, 'type'=>'pagepost', 'post_id'=>$post->id ];

        timeline::insert($info);


        return redirect()->route('myPost', ['id'=>$request->page_id]);

    }

    // show view post bookdetails
    public function viewpost($page_id, $id){
        $page = Page::where('id', $page_id)->first();
        $post = PagePost::where('id', $id)->first();
        $comments = Comment::where('comment_type', 'page_post')
                            ->Where('post_id', $id)->get();

        return view('Page.single_post')
                        ->with('page', $page)
                        ->with('comments', $comments)
                        ->with('post', $post);
    }

    // update page post
    public function updatePagePost(PagePostRequest $request){
        $post = PagePost::where('id', $request->post_id)->first();
        $post->title = $request->title;
        $post->post = $request->post_data;
        $post->save();

        // page post 3 picture
        $lastID = PagePost::find($post->id);
        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $name = $post->id.'_img1' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img1 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $name = $post->id.'_img2' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img2 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img3')) {
            $image = $request->file('img3');
            $name = $post->id.'_img3' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img3 = $name;
            $lastID->save();
        }

        $page = Page::where('id', $request->page_id)->first();
        $post = PagePost::where('id', $request->post_id)->first();

        $request->session()->flash('success_message', 'Posted Updated Successsfully');

        return redirect()->route('viewpost', ['id' => $post->id, 'page_id' => $page->id])
                        ->with('page', $page)
                        ->with('post', $post);
    }

    // delete page
    public function deletePagePost(Request $request){
        $post = PagePost::where('id', $request->post_id)->first();
        $post->delete();

        $request->session()->flash('success_message', 'Posted Deleted Successsfully');


        $info=(object)['page_user'=>'page', 'page_user_id'=>$request->page_id, 'type'=>'pagepost', 'post_id'=>$request->post_id ];
        
        timeline::deletes($info);


        return redirect()->route('myPost', ['id'=>$request->page_id]);
    }














    //
}
