<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as Users;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Post_like;
use App\Models\Comment_report;
use App\Models\Error;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
class User extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 3 ) {
                return $next($request);
            }else{ 
                    App::abort(404);
            }
            
            
            
        });
    }
    public function index()
    {
        return view('admin.user.index');
    }
    public function search(Request $request)
    {      
            $keyword = $request->keyword;
            if($keyword == null or $keyword == " "){
    
            }else{
                $search_results = Users::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->get();    
                return view('admin.user.search_results',compact('search_results'));
            }  
    }

    public function edit($id)
    {
        $data = Users::findOrFail($id);
        return view('admin.user.edit',compact('data'));
    }
    public function updata(Request $request, $id)
    {
        if ($id) {
       $user = Users::find($id);
       $user->role_user=$request->role_user;
       $user->guilty_user=$request->guilty_user;
       $user->intro_user= $request->intro_user;
       $user->save();
       return redirect()->action('Admin\User@index');
    }
    abort(404);
    }

    public function delete($id)
    {
        if ($id) {
                Users::where('id',$id)->delete();
                Comment::where('user_id',$id)->delete();
                Post::where('user_id',$id)->delete();
                Post_like::where('user_id',$id)->delete();
                Error::where('user_id',$id)->delete();
                Feedback::where('user_id',$id)->delete();
                Comment_report::where('comment_report_user_id',$id)->delete();
                return redirect()->action('Admin\User@index');
            
        }
         abort(404);
    }
    
}
