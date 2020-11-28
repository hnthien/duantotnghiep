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
        $post = Post::all();
        $comments = Comment::all();
        // $comments = Comment::orderBy('comment_id', 'DESC')->paginate(9);
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_comment(Request $request)
    {
        $request->validate([
            'comment_content' => 'required',
        ]);
        $comments = new Comment();
        $comments->comment_content = $request->comment_content;
        $comments->user_id = Auth::user()->id;
        $comments->comment_branch = 0;// cái ni để phân nhánh
        $comments->comment_status = 0;// cái này là trang thái 
         //của nó , khi thấy không ổn thì bên admin minhaf thây đổi trang thái đển nó ẩn đi bên phía người dùng
        
        $comments->post_id = $request->post_id; //đoạn n
        // code tiếp điok
        $comments->save();
        // return redirect()->action('CommentController@index');
        return back(); //đây này   
    }

}
