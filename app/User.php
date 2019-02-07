<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\follow_list;

class User extends Model
{
    public static function follower($id,$user_page)
     {
     	$total=follow_list::where('page_user',$user_page)
     	  ->where('followed_page_user_id',$id)->get();

     	return sizeof($total);
     }
    
    public static function isMyFollower($id)
     {
     	$total=follow_list::where('page_user','user')
     	  ->where('followed_page_user_id',session('user')->id)
     	  ->where('user_id',$id)
     	  ->get();

     	return sizeof($total)>0;
     }
     
}
