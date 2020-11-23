<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_like extends Model
{
    protected $primaryKey = 'id';
    protected $table ="post_like";
    protected $fillable = [
    	'id', 'user_id','post_id','post_dislike','post_like'
    ];
}