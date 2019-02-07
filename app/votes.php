<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class votes extends Model
{
    protected $fillable = [
       'user_id','page_user','page_user_id','type','post_id','upvote','downvote',
     ];


    public static function isVoted($userId,$page_user,$page_user_id,$type,$post_id)
    {
        $vote=votes::where('user_id',$userId)
                   ->where('page_user',$page_user)
                   ->where('page_user_id',$page_user_id)
                   ->where('post_id',$post_id)
                   ->where('type',$type)
                   ->get()->first();

        if(sizeof($vote)>0)
          return true;
        else
          return false;
    }

    public static function whichVote($userId,$page_user,$page_user_id,$type,$post_id)
    {
        if(Votes::isVoted($userId,$page_user,$page_user_id,$type,$post_id))
        {
            $vote=votes::where('user_id',$userId)
                       ->where('page_user',$page_user)
                       ->where('page_user_id',$page_user_id)
                       ->where('post_id',$post_id)
                       ->where('type',$type)
                       ->get()->first();

            if($vote->upvote==1)
              return 'upvote';
            elseif(($vote->downvote==1))
              return 'downvote';
            else
              return 'novote';
            }
        }
    }

    public static function make($userId,$page_user,$page_user_id,$post_id,$type,$upvote,$downvote)
     {
         $vote=votes::create([
             'user_id' => $userId,
             'page_user' => $page_user,
             'type' => $type,
             'page_user_id' => $page_user_id,
             'post_id' => $post_id,
             'upvote' => $upvote,
             'downvote' => $downvote,
         ]);

         return $vote;

     }


    public static function giveVote($userId,$page_user,$page_user_id,$type,$post_id,$vote)
    {
        if(votes::isVoted($userId,$page_user,$page_user_id,$type,$post_id))
        {
            $vote=votes::where('user_id',$userId)
                       ->where('page_user',$page_user)
                       ->where('page_user_id',$page_user_id)
                       ->where('post_id',$post_id)
                       ->where('type',$type)
                       ->get()->first();
            if($vote=='upvote')
            {
                $vote->upvote=1;
                $vote->downvote=0;
            }
            elseif($vote=='downvote')
            {
                $vote->upvote=0;
                $vote->downvote=1;
            }
            $vote->save();
        }
        else {
            if($vote=='upvote')
              votes::make($userId,$page_user,$page_user_id,$post_id,$type,1,0);
            elseif()
              votes::make($userId,$page_user,$page_user_id,$post_id,$type,0,1);
        }
    }
}
