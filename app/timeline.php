<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\FoodItem;
use App\PagePost;
use App\Page;
use App\User;
use App\UserPost;
use App\Http\Controllers\Controller;

class timeline extends Model
{
     protected $fillable = [
        'page_user','page_user_id','type','post_id',
      ];
     

     public static function hasAlready($info)
      {
           
      }

     public static function insert($info)
      {    
                    
           timeline::create([
           	   'page_user' => $info->page_user, 
               'page_user_id' => $info->page_user_id,
               'type' => $info->type,
               'post_id' => $info->post_id,
    	   ]);
 
      }

     public static function deletes($info)
      {
           $data=timeline::where('page_user', $info->page_user)
                ->where('page_user_id', $info->page_user_id)
                ->where('type', $info->type)
                ->where('post_id', $info->post_id)
                ->get();

	         $data->each->delete();
      }


     public static function posts()
      {
         $posts=DB::table('timelines')->join('follow_lists',function($join){
            $join->on('follow_lists.page_user','=','timelines.page_user');
            $join->on('follow_lists.followed_page_user_id','=','timelines.page_user_id');
           })->where('follow_lists.user_id','=',session('user')->id)
           ->orderBy('timelines.created_at', 'desc')
           ->paginate(10);
 

         return $posts;

      }

       public static function foodItem($pageId,$postId)
       {
           return FoodItem::where('page_id',$pageId)->where('id',$postId)->get()->first();
       }
       
       public static function userPost($id)
       {
           return UserPost::where('id',$id)->get()->first();
       }

       public static function pagePost($postId)
       {
           return PagePost::where('id',$postId)->get()->first();
       }
       
       public static function page($id)
       {
           return Page::where('id',$id)->get()->first();
       }

       public static function user($id)
       {
           return User::where('id',$id)->get()->first();
       }

}








