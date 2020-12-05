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
            if ($this->role_user == 3 || $this->role_user == 1) {
                return $next($request);
            }else{
                    App::abort(404);
              
            }
            
            
            
        });
    }
    public function index()
    {
        return view('admin.feedback.index');
    } 
   
    public function search(Request $request)
    {      
            $keyword = $request->keyword;
            if($keyword == null or $keyword == " "){
    
            }else{
                $search_results = Feedbacks::where('feedback_title','like','%'.$keyword.'%')->get();    
                return view('admin.feedback.search_results',compact('search_results'));
            }  
    }
    public function detail_feedback($id)
    {
       if ($id) {
       $data = Feedbacks::findOrFail($id);
       $feedback = Feedbacks::find($id);
       $feedback->feedback_status=1;
       $feedback->save();
       return view('admin.feedback.detail_feedback',compact('data'));
    }
    abort(404);
    }
}
