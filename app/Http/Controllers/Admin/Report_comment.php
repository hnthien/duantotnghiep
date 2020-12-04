<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Comment_report;
use Illuminate\Support\Facades\App;
class Report_comment extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 3 ||$this->role_user == 1) {
              
                return $next($request);
            }
            if ($this->role_user == 0){
                return redirect(url('/'));
            }
            App::abort(404);
            
        });
    }
    public function index()
    {
        $user = User::all();
        $comments = Comment::all();
        $comment_report = Comment_report::orderBy('comment_report_id', 'DESC')->get();
        return view('admin.report.index',compact('comments','user','comment_report'));
    }
   
    public function hidden($nur, $id, $idd)
    { 
        $comment = Comment::find($id);
        $comment->comment_status = $nur;
        $comment->save();
        $comment_report = Comment_report::find($idd);
        $comment_report->comment_report_status = $nur;
        $comment_report->save();
        
        return back();
    }
}
