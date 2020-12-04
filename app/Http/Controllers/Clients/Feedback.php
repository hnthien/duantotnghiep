<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback as Feedbacks;
use Illuminate\Support\Facades\Auth;
class Feedback extends Controller
{
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

        Feedbacks::create([
            'user_id' => Auth::user()->id,
            'feedback_title' => $request->feedback_title,
            'feedback_content' => $request->feedback_content,
            'feedback_status' => 0,
        ]);

        return back()->with('status', 'Cám ơn bạn đã đóng góp ý kiến.');;
    }
}
