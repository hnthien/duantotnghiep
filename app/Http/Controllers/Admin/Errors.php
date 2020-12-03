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
            if ($this->role_user == 0) {
                App::abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.error.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_error(Request $request)
    {
        $request->validate([
            'error_url' => 'required|min:10',
            'error_title' => 'required|min:5',
            'error_content' => 'required|min:10',


        ]);
        $error = new Error();
        $error->user_id = Auth::user()->id;
        $error->error_url = $request->error_url;
        $error->error_title = $request->error_title;
        $error->error_content = $request->error_content;
        $error->error_status = 0;
        $error->save();
        return redirect(url('user/successful'))->with('status', 'Cám ơn bạn đã báo lỗi ! Chúng tôi sẽ tìm cách nhanh nhất để fix nó');
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
            $search_results = Error::where('error_title', 'like', '%' . $keyword . '%')->get();
            return view('admin.error.search_results', compact('search_results'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_error($id)
    {
        $data = Error::findOrFail($id);
        $error = Error::find($id);
        $error->error_status = 1;
        $error->save();
        return view('admin.error.detail_error', compact('data'));
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