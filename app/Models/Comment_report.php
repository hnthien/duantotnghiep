<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment_report extends Model
{
    protected $primaryKey = 'comment_report_id';
    protected $table ="comment_report";
    protected $fillable = [
        'comment_report_id', 
        'comment_id',
        'comment_report_user_id',
        'comment_report_status'
    ];
}
