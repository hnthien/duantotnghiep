<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class Comments extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 0 ){
                App::abort(404);
            }else{
                return $next($request);
            }
        });
    }
    public function index()
    { 
        $user = User::all();
        $post = Post::where('user_id',Auth::user()->id)->where('post_status',2)->orderBy('post_id', 'DESC')->paginate(10);
        $comments = Comment::where('comment_branch', 0)->get();
        return view('admin.comment.index',compact('comments','post','user'));
    }
   
  
    
    public function delete($id)
    { 
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }
    public function hidden($nur,$id)
    { 
        if($id){
        $comment = Comment::find($id);
        $comment->comment_status = $nur;
        $comment->save();
        return back();
        } abort(404);
        
    }
    public function detail_comment($id)
    { 
        if($id){
        $user = User::all();
        $post = Post::find($id);
        $comments = Comment::where('comment_branch', 0)->where('post_id', $id)->orderBy('comment_id', 'DESC')->paginate(10);
        return view('admin.comment.detail_comment',compact('user', 'post', 'comments'));
        }abort(404);
        
    }
   
}
