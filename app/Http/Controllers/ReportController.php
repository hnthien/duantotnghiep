<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Carbon;
use App\Comment_report;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $comments = Comment::all();
        $comment_report = Comment_report::all();
        return view('admin.report.index',compact('comments','user','comment_report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
