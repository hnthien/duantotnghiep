<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table ="category";
    protected $fillable = [
    	'category_id', 'category_title','category_branch','category_intro'
    ];
}
