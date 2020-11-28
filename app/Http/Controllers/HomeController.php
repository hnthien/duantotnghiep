<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use Illuminate\Support\Carbon;
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
        return redirect(url('/login'))->with('log','Password changed successfully.');
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
    //author
    public function author($name,$id)
    {
        $user_author= User::find($id);
        $post_author = Post::where('user_id',$id)->orderBy('post_id', 'DESC')->paginate(10);
        return view('author', compact('user_author', 'post_author'));
    }
    // password edit
    public function password()
    {     
        return view('auth.change_password');
    }
    public function account(Request $request)
    {     
        $news = User::find( Auth::user()->id);
        if ($request->hasFile('images_user')) {
            $news->images_user = $request->file('images_user')->getClientOriginalName();
            $request->file('images_user')->move(public_path('images/user'),   $request->file('images_user')->getClientOriginalName());
           
            
        }
        $news->name= $request->name;
        $news->phone_user= $request->phone_user;
        $news->intro_user=$request->intro_user;
        $news->save();
        return redirect(url('/account'));
    }
   
    // edit pass
    public function edit_pass(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',

        ]);    
        $email = $request->email;
        $password = $request->password;
        $result = User::where('email',$email)->find(Auth::user()->id);
        if($result){          
            if(Hash::check($password, Auth::user()->password)){
               
                    $news = User::find(Auth::user()->id);
                    $news->password = Hash::make($request->confirmpassword);
                    $news->save();
                return redirect(url('/user/logout'));
               
            }else{
                return redirect()->action('HomeController@password')->with('pass','Password is incorrect.');                  
            }
        }else{       
            return redirect()->action('HomeController@password')->with('email','Email is incorrect.');                  
       
        }     
       
       return;
   
    }
   
   
}
