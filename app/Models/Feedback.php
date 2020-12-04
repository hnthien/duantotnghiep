<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'feedback_id';
    protected $table = "feedback";
    protected $fillable = [
        'feedback_id', 'user_id', 'feedback_title', 'feedback_content', 'feedback_status'
    ];
}