<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as ModelsCategory;
use App\Models\Post;
use App\Models\Feedback;
use App\Models\Error;
use App\User;
use App\Models\Comment;
use App\Models\Comment_report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class Home extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 0) {
                App::abort(404);
            }else{
                return $next($request);
            }
        });
    }

    public function index()
    {
        $category = ModelsCategory::all();
        $feedback = Feedback::all();
        $comment = Comment::where('comment_branch',0)->get();
        $comment_report= Comment_report::all();
        $error = Error::all();
        $user = User::all();
        $post_all =  Post::all();
        $post =  Post::orderBy('post_id', 'DESC')->take(6)->get();
        return view('admin.index', compact('post', 'post_all', 'category', 'user', 'feedback', 'error','comment','comment_report'));
    }
}
