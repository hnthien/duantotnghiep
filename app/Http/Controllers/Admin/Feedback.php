<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback as Feedbacks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class Feedback extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 0) {
                App::abort(404);
            }
            return $next($request);
        });
    }

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
        $feedback = new Feedbacks();
        $feedback->user_id = Auth::user()->id;
        $feedback->feedback_title = $request->feedback_title;
        $feedback->feedback_content = $request->feedback_content;
        $feedback->feedback_status = 0;
        $feedback->save();
        return redirect(url('user/successful'))->with('status', 'Cám ơn bạn đã đóng góp ý kiến.');;
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
        if ($keyword == null or $keyword == " ") {
        } else {
            $search_results = Feedbacks::where('feedback_title', 'like', '%' . $keyword . '%')->get();
            return view('admin.feedback.search_results', compact('search_results'));
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
        $data = Feedbacks::findOrFail($id);
        $feedback = Feedbacks::find($id);
        $feedback->feedback_status = 1;
        $feedback->save();
        return view('admin.feedback.detail_feedback', compact('data'));
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