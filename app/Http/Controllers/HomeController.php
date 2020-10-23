<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function index1()
    {
    return view('home'); 
    }
    // password edit
    public function password()
    {     
        return view('auth.change_password');
    }
    public function edit_password(Request $request,$id)
    {
       if(($request->email) == null or ($request->password) == null or ($request->newpassword) == null or ($request->confirmpassword)==null){
        echo"<script>alert(' Không được để trống các ô !');</script>";
       }else{
        $email = $request->email;
        $password = $request->password;
        $result1=User::where('email',$email)->find($id);
        if($result1){          
            if(Hash::check($password, Auth::user()->password)){
                if($request->newpassword == $request->confirmpassword ){
                    $news = User::find($id);
                    $news->password = Hash::make($request->confirmpassword);
                    $news->save();
                    echo"<script>alert(' Đã Thay Đổi Mật Khẩu !');</script>";
                }else{
                    echo"<script>alert(' Mật khẩu mới và xác nhận mật khẩu không giống nhau !');</script>";
                }
            }else{
             echo "<script>alert(' Sai Mật Khẩu !')</script>";                    
            }
        }else{       
         echo "<script>alert(' Sai Email !')</script>";        
        }     
       }
       return;
   
    }
}
