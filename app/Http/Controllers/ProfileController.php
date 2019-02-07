<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use Illuminate\Support\Facades\DB;
use App\UserPost;
use App\User;
use App\FollowedUser;
use File;
use App\Comment;
use App\timeline;
use App\Page;

class ProfileController extends Controller
{
    // show my post page
    public function index(){
        $post = UserPost::where('user_id', session('user')->id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('comment_type', 'user_post')->get();

        return view('Profile.index', ['posts' => $post, 'comments' => $comments]);
    }

    // insert post
    public function insertpost(UserPostRequest $request){
        $post = new UserPost();
        $post->user_id = $request->user_id;
        $post->post = $request->post_data;
        $post->upvote = 0;
        $post->downvote = 0;
        $post->date = date("F j, Y, g:i a");
        $post->img1 = null;
        $post->img2 = null;
        $post->img3 = null;
        $post->save();

        // 3 post picture
        $lastID = UserPost::find($post->id);
        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $name = $post->id.'_img1' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img1 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $name = $post->id.'_img2' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img2 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img3')) {
            $image = $request->file('img3');
            $name = $post->id.'_img3' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img3 = $name;
            $lastID->save();
        }
        $request->session()->flash('success_message', 'Posted Successsfully');


        $info=(object)['page_user'=>'user', 'page_user_id'=>$request->user_id, 'type'=>'userpost', 'post_id'=>$post->id ];

        timeline::insert($info);



        return redirect()->route('profileIndexPage');

        return view('Profile.index');
    }

    // show view post page
    public function viewpost($id){
        $post = UserPost::where('id', $id)->first();
        $comments = Comment::where('comment_type', 'user_post')
                            ->Where('post_id', $id)->get();

        return view('Profile.viewpost', ['post' => $post, 'comments' => $comments]);
    }

    // delete page
    public function deleteUserPost(Request $request){
        $post = UserPost::where('id', $request->user_post)->first();

        // delete img1
        $image_path = "/upload/user_post_picture/$post->img1";
        //dd($image_path);
        if(File::exists($image_path)) {
            unlink($image_path);
        }
        // delete img2
        $image_path = "/upload/user_post_picture/$post->img2";
        if(File::exists($image_path)) {
            unlink($image_path);
        }
        // delete img3
        $image_path = "/upload/user_post_picture/$post->img3";
        if(File::exists($image_path)) {
            unlink($image_path);
        }

        $post->delete();

        $request->session()->flash('success_message', 'Posted Deleted Successsfully');


        $info=(object)['page_user'=>'user', 'page_user_id'=>session('user')->id, 'type'=>'userpost', 'post_id'=>$request->user_post ];
        
        timeline::deletes($info);

        return redirect()->route('profileIndexPage');
    }

    // update user post
    public function updateUserPost(UserPostRequest $request){
        $post = UserPost::where('id', $request->post_id)->first();
        $post->post = $request->post_data;
        $post->save();

        // user post 3 picture
        $lastID = UserPost::find($post->id);
        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $name = $post->id.'_img1' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img1 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $name = $post->id.'_img2' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img2 = $name;
            $lastID->save();
        }
        if ($request->hasFile('img3')) {
            $image = $request->file('img3');
            $name = $post->id.'_img3' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/user_post_picture');
            $image->move($destinationPath, $name);
            $lastID->img3 = $name;
            $lastID->save();
        }

        $request->session()->flash('success_message', 'Posted Updated Successsfully');

        return redirect()->route('viewuserpost', ['id' => $post->id]);
    }

    // show followlist  page
    public function followlistPage(){
        $userlist = User::orderBy('fullname', 'asc')->get();    // all user
        $user = User::where('id', session('user')->id)->get();  // only me
        //$followedUser = FollowedUser::where('user_id', session('user')->id)->get();

        $followedUser = DB::table('users')
                                ->join('followed_users', 'users.id', '=', 'followed_users.user_id')
                                ->where('users.id', session('user')->id)
                                ->get();

        $result = $userlist->diff($user);   // this exclude my account

        return view('Profile.followlistUser')->with('userlist', $result)
                                             ->with('foloweduserlist', $followedUser);
    }

    // create follow this guy
    public function follow_this_guy(Request $request){
        $user = new FollowedUser();
        $user->user_id = $request->userid;
        $user->followed_user_userid = $request->follow_userid;
        $user->date = date("F j, Y, g:i a");
        $user->save();

        $userlist = User::orderBy('fullname', 'asc')->get();    // all user
        $user = User::where('id', session('user')->id)->get();  // only me
        $result = $userlist->diff($user);   // this exclude my account
        //$followedUser = FollowedUser::where('user_id', session('user')->id)->get();

        $followedUser = DB::table('users')
                                ->join('followed_users', 'users.id', '=', 'followed_users.user_id')
                                ->where('followed_users.user_id', session('user')->id)
                                ->get();

        return view('Profile.followlistUser')->with('userlist', $result)
                                             ->with('foloweduserlist', $followedUser);;
    }




    public function getSearch()
    {
        $people=User::where('id','!=',session('user')->id)->get();
        return view('Profile.searchpeople')->with('peoples',$people)->with('followerCheck',false)->with('followedUser',false);
    }
    
    public function postSearch(Request $request)
    {
        $people=User::where('username', 'LIKE' ,"%{$request->peoplename}%")
                    ->where('id','!=',session('user')->id)
                    ->get();
           
        return view('Profile.searchpeople')->with('peoples',$people)->with('followerCheck',false)->with('followedUser',false);
    }
    
    public function followers()
    {
        $people=User::where('id','!=',session('user')->id)->get();
        return view('Profile.searchpeople')->with('peoples',$people)->with('followerCheck',true)->with('followedUser',false);
    }
    
    public function followedUser()
    {
        $people=User::where('id','!=',session('user')->id)->get();
        return view('Profile.searchpeople')->with('peoples',$people)->with('followerCheck',false)->with('followedUser',true);
    }
    
    public function followedPage()
    {
        $pages=Page::where('user_id','!=',session('user')->id)->get();
         
        return view('SearchFood.searchByRestaurant')->with('pagelist', $pages)->with('checkIsFollowed', true);
    }

}
