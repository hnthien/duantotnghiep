<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class Errors extends Controller
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
        return view('admin.error.index');
    }
    public function watched()
    {
        return view('admin.error.watched');
    }
   
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword == null or $keyword == " ") {
        } else {
            $search_results = Error::where('error_title', 'like', '%' . $keyword . '%')->get();
            return view('admin.error.search_results', compact('search_results'));
        }
    }
    public function detail_error($id)
    {
        if ($id) {
            $data = Error::findOrFail($id);
            $error = Error::find($id);
            $error->error_status = 1;
            $error->save();
            return view('admin.error.detail_error', compact('data'));
        } abort(404);
    }
}
