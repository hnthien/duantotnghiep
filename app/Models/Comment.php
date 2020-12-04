<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';
    protected $table ="comment";
    protected $fillable = [
        'comment_id', 
        'user_id',
        'post_id',
        'comment_content',
        'comment_status',
        'comment_branch'
    ];
}
