<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class Admin_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {      
            $keyword = $request->keyword;
            if($keyword == null or $keyword == " "){
    
            }else{
                $search_results = User::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->get();    
                return view('admin.user.search_results',compact('search_results'));
            }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new_user(Request $request)
    {
        return view('admin.user.new_user');
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
        $data = User::findOrFail($id);
        return view('admin.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updata(Request $request, $id)
    {
       $user = User::find($id);
       $user->role_user=$request->role_user;
       $user->guilty_user=$request->guilty_user;
       $user->intro_user= $request->intro_user;
       $user->save();
       return redirect()->action('Admin_UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect()->action('Admin_UserController@index');
    }
    public function delete_all(Request $request){
        $ids = $request->get('ids');
        if($ids != null){
            $db= DB::delete('delete from users where id in ('.implode(",",$ids).')');
            return redirect()->action('Admin_UserController@index');
        }else{
            return redirect()->action('Admin_UserController@index')->with('notification','Đại ca vui lòng chọn người muốn đuổi.');
        }
       

    }
   
}
