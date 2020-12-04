<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Comment_report;

class Comments extends Controller
{
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
    {   if($id) {
        $post = Post::find($id);
        $user = User::all();
        $comments = Comment::where('comment_branch', 0)->where('post_id', $id)->where('comment_status',0)->orderBy('comment_id', 'DESC')->take(20)->get();
        return view('comment', compact('post','user','comments'));
        } abort(404);

    }
    public function create_report($id)
    { 
        $comment_report = new Comment_report();
        $check_user_idd = Comment_report::where('comment_report_user_id', Auth::user()->id)->where('comment_id', $id)->doesntExist();
        if ($check_user_idd) {
        $comment_report->comment_report_user_id = Auth::user()->id;
        $comment_report->comment_id = $id; 
        $comment_report->comment_report_status = 0; 
        $comment_report->save();   
        return back()->with('report','Cám ơn bạn đã báo cáo , Chúng tôi sẽ tiến hành xử lí bình luận vi phạm này !'); 
        }else{
            return back()->with('report','Bạn đã báo cáo bình luận này , Chúng tôi sẽ tiến hành xử lí bình luận vi phạm này !');  
        }
    }
}
