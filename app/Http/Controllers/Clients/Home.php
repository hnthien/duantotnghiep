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

class Home extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout()
    {
        return Auth::logout();
    }
    //admin
    public function admin(Request $request)
    {
        $user = User::all();
        $number = 0;
        for ($i = 1; $i > $number; $i++) {
            foreach ($user as $row) {
                if (($row->role_user) == 0) {
                    $number + 1;
                }
            }
        }
        echo $number;
        return view('admin.index');
    }
    //
    public function index()
    {
        $popular_post = Post::whereBetween('created_at', [$dt = Carbon::now()->subDays(7), $dt = Carbon::now()])->orderBy('post_view', 'DESC')->skip(3)->take(5)->get();
        $popular_post1 = Post::whereBetween('created_at', [$dt = Carbon::now()->subDays(7), $dt = Carbon::now()])->orderBy('post_view', 'DESC')->take(1)->get();
        $popular_post2 = Post::whereBetween('created_at', [$dt = Carbon::now()->subDays(7), $dt = Carbon::now()])->orderBy('post_view', 'DESC')->skip(1)->take(2)->get();
        $category = Category::all();
        $category_p = Category::where('category_branch', 0)->take(12)->get();
        $user = User::all();
        $post =  Post::orderBy('post_id', 'DESC')->take(30)->get();
        return view('index', compact('post', 'category', 'category_p', 'user', 'popular_post', 'popular_post1', 'popular_post2'));
    }
    // password edit
    public function password()
    {
        return view('auth.change_password');
    }
    public function account(Request $request)
    {
        $news = User::find(Auth::user()->id);
        if ($request->hasFile('images_user')) {
            $news->images_user = $request->file('images_user')->getClientOriginalName();
            $request->file('images_user')->move(public_path('images/user'),   $request->file('images_user')->getClientOriginalName());
        }
        $news->name = $request->name;
        $news->phone_user = $request->phone_user;
        $news->intro_user = $request->intro_user;
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
                return redirect()->action('HomeController@password')->with('pass', 'Password is incorrect.');
            }
        } else {
            return redirect()->action('HomeController@password')->with('email', 'Email is incorrect.');
        }

        return;
    }
}