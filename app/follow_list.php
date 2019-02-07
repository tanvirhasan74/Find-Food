<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class follow_list extends Model
{

	protected $fillable = [
        'user_id','page_user','followed_page_user_id','status',
    ];


    public static function isFollowed($followed_page_user_id,$page_user)
    {
    	$list=follow_list::where('followed_page_user_id',$followed_page_user_id)->where('page_user',$page_user)->where('user_id',session('user')->id)->get();

        return sizeof($list)>0;
    }




    public static function make($info)
    {
         
         if(!follow_list::isFollowed($info->followed_page_user_id, $info->page_user))
         	{
               follow_list::create([
	               'user_id' => session('user')->id,
	               'page_user' => $info->page_user,
	               'followed_page_user_id' => $info->followed_page_user_id,
	               'status' => 'active',
	    	   ]);
         	}
 
    }


    public static function deletes($info)
    {
             $data=follow_list::where('followed_page_user_id',$info->followed_page_user_id)
	                    ->where('page_user',$info->page_user)
	                    ->where('user_id',session('user')->id)
	                    ->get();

	         $data->each->delete();
    }


}
