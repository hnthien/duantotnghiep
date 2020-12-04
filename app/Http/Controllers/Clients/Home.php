<?php

namespace App\Http\Controllers\Clients;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class Home extends Controller
{
    public function logout()
    {
        return Auth::logout();
    }
    // view home index 
    public function index(Request $request)
    {
        $popular_post = Post::where('post_status',2)->whereBetween('created_at', [$dt = Carbon::now()->subDays(7),$dt = Carbon::now()])->orderBy('post_view','DESC')->skip(3)->take(5)->get();
        $popular_post1 = Post::where('post_status',2)->whereBetween('created_at', [$dt = Carbon::now()->subDays(7),$dt = Carbon::now()])->orderBy('post_view','DESC')->take(1)->get();
        $popular_post2 = Post::where('post_status',2)->whereBetween('created_at', [$dt = Carbon::now()->subDays(7),$dt = Carbon::now()])->orderBy('post_view','DESC')->skip(1)->take(2)->get();
        $category = Category::all();
        $category_p = Category::where('category_branch',0)->take(12)->get();
        $user = User::all();
        $post =  Post::where('post_status',2)->orderBy('post_id', 'DESC')->take(30)->get();
        return view('index', compact('post', 'category','category_p', 'user','popular_post','popular_post1','popular_post2'));
    
    }
     //author
     public function author($name, $id)
     {
         $check = User::where('id', $id)->first();
         if (!empty($check)) {
             if (Str::slug($check->name, '-')==$name) {
                 $user_author= User::find($id);
                 $post_author = Post::where('user_id', $id)->orderBy('post_id', 'DESC')->paginate(10);
                 return view('author', compact('user_author', 'post_author'));
             } else {
                 return abort(404);
             }
         } else {
             return abort(404);
         }
     }
     // password edit
     public function password()
     {
         return view('auth.change_password');
     }
     // edit user
     public function account(Request $request)
     {
         $news = User::find(Auth::user()->id);
         if ($request->hasFile('images_user')) {
             $news->images_user = $request->file('images_user')->getClientOriginalName();
             $request->file('images_user')->move(public_path('images/user'), $request->file('images_user')->getClientOriginalName());
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
         $result = User::where('email', $email)->find(Auth::user()->id);
         if ($result) {
             if (Hash::check($password, Auth::user()->password)) {
                 $news = User::find(Auth::user()->id);
                 $news->password = Hash::make($request->confirmpassword);
                 $news->save();
                 return redirect(url('/user/logout'));
             } else {
                 return redirect()->action('Clients/Home@password')->with('pass', 'Password is incorrect.');
             }
         } else {
             return redirect()->action('Clients/Home@password')->with('email', 'Email is incorrect.');
         }
        
         return;
     }
}
