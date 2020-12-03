<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Post_like;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\User;
use Illuminate\Support\Carbon;

class Posts extends Controller
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
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);

        return view('admin.post.index', compact('posts', 'category', 'user'));
    }
    public function is_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);

        return view('admin.post.is_approved', compact('posts', 'category', 'user'));
    }
    public function is_not_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);

        return view('admin.post.is_not_approved', compact('posts', 'category', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_post()
    {
        $categorys_branch = Category::all();
        $categorys = Category::where('category_branch', 0)->get();
        return view('admin.post.new_post', compact('categorys', 'categorys_branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_post(Request $request)
    {

        $request->validate([
            'post_title' => 'required',
            'category_id' => 'required',
            'post_slug' => 'required',
            'post_intro' => 'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag' => 'required',
            'post_content' => 'required',

        ]);
        $posts = new Post();
        $posts->post_title = $request->post_title;

        $posts->category_id = $request->category_id;
        $posts->user_id = Auth::user()->id;
        $posts->post_slug = $request->post_slug;

        if ($request->post_status == 1) {
            $posts->post_status = $request->post_status;
        } else {
            $posts->post_status = 0;
        }

        $posts->censor_status = 0;
        $posts->post_view = 0;
        $posts->post_intro = $request->post_intro;
        $file = $request->file('post_image');
        $posts['post_image'] = $file->getClientOriginalName();
        $file->move(public_path('images/post_image'), $file->getClientOriginalName());
        $posts->post_tag = preg_split('/,/', $request->post_tag);
        $posts->post_content = $request->post_content;
        $posts->save();

        return redirect()->action('PostController@index');
    }

    public function create_posts()
    {
        $categorys = Category::all();
        return view('admin.post.new_post', compact('categorys'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function url(Request $request)
    {
        $categoryname = $request->post_title;

        $slug = Str::slug($categoryname, '-');

        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_slug, $id)
    {
        $categorys_branch = Category::all();
        $categorys = Category::where('category_branch', 0)->get();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post', 'categorys', 'categorys_branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $request->validate([
            'post_title' => 'required',
            'category_id' => 'required',
            'post_slug' => 'required',
            'post_intro' => 'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag' => 'required',
            'post_content' => 'required',
        ]);

        $posts = Post::find($post_id);
        $posts->post_title = $request->post_title;
        $posts->category_id = $request->category_id;
        $posts->user_id = Auth::user()->id;
        if ($request->post_status == 1) {
            $posts->post_status = $request->post_status;
        } else {
            $posts->post_status = 0;
        }
        $posts->post_slug = $request->post_slug;
        $posts->post_intro = $request->post_intro;
        if ($request->hasFile('post_image')) {
            $posts->post_image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path('images/post_image'),   $request->file('post_image')->getClientOriginalName());
        }

        $posts->post_tag = preg_split('/,/', $request->post_tag);;
        $posts->post_content = $request->post_content;
        $posts->save();
        return redirect()->action('PostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->action('PostController@index');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword == null or $keyword == " ") {
        } else {
            $user = User::all();
            $search_results = Post::where('post_title', 'like', '%' . $keyword . '%')->orderBy('post_id', 'DESC')->get();
            return view('admin.post.search_results', compact('search_results', 'user'));
        }
    }
}