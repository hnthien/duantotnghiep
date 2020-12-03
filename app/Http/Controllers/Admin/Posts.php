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
        if ($this->role_user == 2) {
            $user = User::where('id', $this->role_user)->get();
            $category = Category::get();
            $posts = Post::where('user_id', $this->role_user)->orderBy('post_id', 'DESC')->paginate(9);
            return view('admin.post.index', compact('posts', 'category', 'user'));
        }
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);
        return view('admin.post.index', compact('posts', 'category', 'user'));
    }
    public function is_approved()
    {
        if ($this->role_user == 2) {
            $user = User::where('id', $this->role_user)->get();
            $category = Category::get();
            $posts = Post::where('user_id', $this->role_user)->orderBy('post_id', 'DESC')->paginate(9);
        }
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);

        return view('admin.post.is_approved', compact('posts', 'category', 'user'));
    }
    public function is_not_approved()
    {
        if ($this->role_user == 2) {
            $user = User::where('id', $this->role_user)->get();
            $category = Category::get();
            $posts = Post::where('user_id', $this->role_user)->orderBy('post_id', 'DESC')->paginate(9);
        }
        $user = User::all();
        $category = Category::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);

        return view('admin.post.is_not_approved', compact('posts', 'category', 'user'));
    }

    public function new_post()
    {
        $categorys_branch = Category::all();
        $categorys = Category::where('category_branch', 0)->get();
        return view('admin.post.new_post', compact('categorys', 'categorys_branch'));
    }

    public function create_post(Request $request)
    {
        $message = [
            'post_title.required' => 'Vui lòng nhập tiêu đề',
            'category_id.required' => 'Vui lòng chọn thể loại',
            'post_slug.required' => 'Url không được để trống',
            'post_intro.required' => 'Vui lòng nhập mô tả ngắn',
            'post_image.required' => 'Vui lòng chọn ảnh',
            'post_image.image' => 'Vui lòng chọn đúng định dạng ảnh',
            'post_tag.required' => 'Nhập 1 ít thẻ tag',
            'post_content.required' => 'Vui lòng nhập nội dung'
        ];

        $request->validate([
            'post_title' => 'required',
            'category_id' => 'required',
            'post_slug' => 'required|max:255',
            'post_intro' => 'required|max:1000',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'post_tag' => 'required|max:1000',
            'post_content' => 'required',

        ], $message);

        $file = $request->file('post_image');
        $file->move(public_path('images/post_image'), $file->getClientOriginalName());

        Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'post_status' => $request->post_status,
            'censor_status' => 0,
            'post_title' => $request->post_title,
            'post_slug' => $request->post_slug,
            'post_tag' => preg_split('/,/', $request->post_tag),
            'post_intro' => $request->post_intro,
            'post_image' => $file->getClientOriginalName(),
            'post_content' => $request->post_content,
            'post_view' => 0,
        ]);

        return redirect()->action('Admin\Posts@index');
    }

    public function create_posts()
    {
        $categorys = Category::all();
        return view('admin.post.new_post', compact('categorys'));
    }

    // public function url(Request $request)
    // {
    //     $categoryname = $request->post_title;

    //     $slug = Str::slug($categoryname, '-');

    //     return response()->json(['slug' => $slug]);
    // }

    public function edit($post_slug, $id)
    {
        if ($id) {
            $categorys_branch = Category::all();
            $categorys = Category::where('category_branch', 0)->get();
            $post = Post::find($id);
            return view('admin.post.edit', compact('post', 'categorys', 'categorys_branch'));
        }
    }

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
        return redirect()->action('Admin\Posts@index');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->action('Admin\Posts@index');
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