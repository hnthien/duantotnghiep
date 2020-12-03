<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $primaryKey = 'error_id';
    protected $table = "error";
    protected $fillable = [
        'error_id', 'user_id', 'error_url', 'error_title', 'error_content', 'error_status'
    ];
}