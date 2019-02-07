<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function totalComment($postId,$user_post)
    {
        $comments=Comment::where('post_id',$postId)->where('comment_type',$user_post)->get();

        return sizeof($comments);
    }
}
