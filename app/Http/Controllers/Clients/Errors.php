<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Error;
use Illuminate\Support\Facades\Auth;

class Errors extends Controller
{
    public function create_error(Request $request)
    {
        $message = [
            'error_url.required' => 'Vui lòng nhập Url',
            'error_title.required' => 'Vui lòng nhập tiêu đề',
            'error_content.required' => 'Vui lòng nhập nội dung',
            'error_url.min:10' => 'Vui lòng nhập Url lớn hơn 10 kí tự',
            'error_title.min:5' => 'Vui lòng nhập tiêu đề lớn hơn 5 kí tự',
            'error_content.min:10' => 'Vui lòng nhập nội dung lớn hơn 10 kí tự'
        ];

        $request->validate([
            'error_url' => 'required|min:10',
            'error_title' => 'required|min:5',
            'error_content' => 'required|min:10',
        ], $message);
        
        $error = new Error();
        $error->user_id = Auth::user()->id;
        $error->error_url = $request->error_url;
        $error->error_title = $request->error_title;
        $error->error_content = $request->error_content;
        $error->error_status = 0;
        $error->save();
        return back()->with('status','Cám ơn bạn đã báo lỗi ! Chúng tôi sẽ tìm cách nhanh nhất để fix nó');
    }
}
