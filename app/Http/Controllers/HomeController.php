<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\timeline;
use App\User;

class HomeController extends Controller
{
    public function index(){


        $posts=timeline::posts();

     
        $peoples=User::where('id','!=',session('user')->id)->get();
        //return view('Profile.searchpeople')->with('peoples',$people);
    

        return view('Home.timeline')->with('posts',$posts)->with('peoples',$peoples);
    }
}
