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
    public function logout()
    {
        Auth::logout();
        return ;
    }
    //admin
    public function admin(Request $request){
        $user = User::all();
        $number = 0;
        for($i=1;$i>$number;$i++){
            foreach($user as $row){
                if(($row->role_user)==0){
                    $number+1;
                }
            }
        }
        echo $number;
        return view('admin.index');
    }
    //
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
    public function account(Request $request)
    {     
        //   $request->validate([
        //     'email' => 'required|email',

        // ]);
        $news = User::find( Auth::user()->id);
        if ($request->hasFile('images_user')) {
            $news->images_user = $request->file('images_user')->getClientOriginalName();
            $request->file('images_user')->move(public_path('images/user'),   $request->file('images_user')->getClientOriginalName());
           
            
        }
        $news->name= $request->name;
        $news->phone_user= $request->phone_user;
        $news->address_user=$request->address_user;
        $news->save();
        return redirect(url('/account'));
    }
    public function edit_password(Request $request,$id)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'newpassword' => 'required',
        //     'confirmpassword' => 'required|same:newpassword',

        // ]);
       if(($request->email) == null or ($request->password) == null or ($request->newpassword) == null or ($request->confirmpassword)==null){
        echo"The input field is required.";
       }else{
        $email = $request->email;
        $password = $request->password;
        $result=User::where('email',$email)->find($id);
        if($result){          
            if(Hash::check($password, Auth::user()->password)){
                if($request->newpassword == $request->confirmpassword ){
                    $news = User::find($id);
                    $news->password = Hash::make($request->confirmpassword);
                    $news->save();
                    echo "<script>alert(' Successfully!');</script>";
                    echo "<div class='alert alert-success' style='color:green'>Đã đổi mật khẩu thành công</div>";
                    // return redirect(url('/user/logout'));
                }else{
                    echo"Confirmpassword is incorrect.";
                }
            }else{
             echo "Password is incorrect.";                    
            }
        }else{       
         echo "Email is incorrect.";        
        }     
       }
       return;
   
    }
   
}