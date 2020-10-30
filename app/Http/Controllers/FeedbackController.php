<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Illuminate\Support\Facades\Auth;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_feedback(Request $request)
    {
           $request->validate([
            'feedback_title' => 'required|min:5',
            'feedback_content' => 'required|min:10',
          

        ]);
        $feedback = new Feedback();
        $feedback->user_id= Auth::user()->id;
        $feedback->feedback_title= $request->feedback_title;
        $feedback->feedback_content= $request->feedback_content;
        $feedback->feedback_status=0;
        $feedback->save();
        return redirect(url('user/successful'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {      
            $keyword = $request->keyword;
            if($keyword == null or $keyword == " "){
    
            }else{
                $search_results = Feedback::where('feedback_title','like','%'.$keyword.'%')->get();    
                return view('admin.feedback.search_results',compact('search_results'));
            }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_feedback($id)
    {
       $data = Feedback::findOrFail($id);
       $feedback = Feedback::find($id);
       $feedback->feedback_status=1;
       $feedback->save();
       return view('admin.feedback.detail_feedback',compact('data'));
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
