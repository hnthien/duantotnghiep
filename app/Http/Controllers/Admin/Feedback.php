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
            if ($this->role_user != 1 || $this->role_user != 3) {
                App::abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.feedback.index');
    }

    public function create_feedback(Request $request)
    {
        $message = [
            'feedback_title.required' => 'Vui lòng nhập tiêu đề',
            'feedback_title.min' => ' Tiêu đề phải lớn hơn 5 kí tự',
            'feedback_content.required' => ' Vui lòng nhập nội dung',
            'feedback_content.min' => 'Nội dung phải lớn hơn 10 kí tự',
        ];

        $request->validate([
            'feedback_title' => 'required|min:5',
            'feedback_content' => 'required|min:10',
        ], $message);

        $created = Feedbacks::create([
            'user_id' => Auth::user()->id,
            'feedback_title' => $request->feedback_title,
            'feedback_content' => $request->feedback_content,
            'feedback_status' => 0,
        ]);

        return redirect(url('user/successful'))->with('status', 'Cám ơn bạn đã đóng góp ý kiến.');;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword != null || $keyword != " ") {
            $search_results = Feedbacks::where('feedback_title', 'like', '%' . $keyword . '%')->get();
            return view('admin.feedback.search_results', compact('search_results'));
        }
    }

    public function detail_feedback($id)
    {
        if ($id) {
            $data = Feedbacks::findOrFail($id);
            $feedback = Feedbacks::find($id);
            if ($feedback != null) {
                $feedback->feedback_status = 1;
                $feedback->save();
                return view('admin.feedback.detail_feedback', compact('data'));
            }
        }
        abort(404);
    }
}