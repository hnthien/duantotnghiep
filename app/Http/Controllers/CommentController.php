<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Carbon;
use App\Comment_report;
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = User::all();
        $post = Post::orderBy('post_id', 'DESC')->paginate(10);
        $comments = Comment::where('comment_branch', 0)->get();
        return view('admin.comment.index',compact('comments','post','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_comment()
    { 
        $user = User::all();
        $post = Post::all();
        $comments = Comment::all();
        return view('news',compact('user', 'post', 'comments'));
    }
    public function delete($id)
    { 
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }
    public function hidden($nur,$id)
    { 
        $comment = Comment::find($id);
        $comment->comment_status = $nur;
        $comment->save();
        return back();
    }
    public function detail_comment($id)
    { 
        $user = User::all();
        $post = Post::find($id);
        $comments = Comment::where('comment_branch', 0)->where('post_id', $id)->orderBy('comment_id', 'DESC')->paginate(10);
        return view('admin.comment.detail_comment',compact('user', 'post', 'comments'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_comment(Request $request )
    {
        if($request->comment  == null ){
           return 'validation.required';
        }else{         
                $comments = new Comment();
                $comments->comment_content = $request->comment;
                $comments->user_id = Auth::user()->id;
                $comments->comment_branch = 0;
                $comments->comment_status = 0;         
                $comments->post_id = $request->post_id;       
                $comments->save();     
                return;
        }  
    }
    public function create_comment_branch(Request $request,$id)
    {
        if($request->comment  == null ){
            return 'validation.required';
         }else{ 
        $comments = new Comment();
        $comments->comment_content = $request->comment;
        $comments->user_id = Auth::user()->id;
        $comments->comment_branch = $id;
        $comments->comment_status = 0;
        $comments->post_id = $request->post_id; 
        $comments->save();
        return back(); 
    }   
    }
    public function comment_view(Request $request,$id)
    {    $post = Post::find($id);
         $user = User::all();
        $comments = Comment::where('comment_branch', 0)->where('post_id', $id)->where('comment_status',0)->orderBy('comment_id', 'DESC')->take(20)->get();
        return view('comment', compact('post','user','comments'));

    }


}
