<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $table ="post";
    protected $casts = [
        'post_tag' => 'array',
    ];
    protected $fillable = [
        'post_id',
        'user_id',
        'category_id',
        'post_status',
        'censor_status',
        'post_title',
        'post_slug',
        'post_tag',
        'post_intro',
        'post_image',
        'post_content',
        'post_view',
        'article_notes'
    ];
}
