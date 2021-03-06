<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post_like;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\App;
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
            }else{
                return $next($request);
            }
           
        });
    }
    //home post
    public function index()
    {
        $user = User::all();
        $category = Category::all();
        $comments = Comment::all();
        $posts = Post::where('post_status', 0)->orWhere('post_status', 3)->orwhere('post_status', 2)->orderBy('post_id', 'DESC')->paginate(15);

        return view('admin.post.index', compact('posts', 'category', 'user'));
    }
    // da phe duyet
    public function is_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::where('post_status', 2)->orderBy('post_id', 'DESC')->paginate(15);

        return view('admin.post.is_approved', compact('posts', 'category', 'user'));
    }
    // chua phe duyet
    public function is_not_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::where('post_status', 0)->orWhere('post_status', 3)->orderBy('post_id', 'DESC')->paginate(15);
        return view('admin.post.is_not_approved', compact('posts', 'category', 'user'));
    }
     //cua toi post
    public function my_index()
    {
        $user = User::all();
        $category = Category::all();
        $comments = Comment::all();
        $posts = Post::where('user_id',Auth::user()->id)->orderBy('post_id', 'DESC')->paginate(15);

        return view('admin.my_post.my_index', compact('posts', 'category', 'user'));
    }
     // cua toi da phe duyet
    public function my_is_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::where('post_status', 2)->where('user_id',Auth::user()->id)->orderBy('post_id', 'DESC')->paginate(15);

        return view('admin.my_post.index', compact('posts', 'category', 'user'));
    }
    // cua toi chua phe duyet
    public function my_is_not_approved()
    {
        $user = User::all();
        $category = Category::all();
        $posts = Post::where('user_id',Auth::user()->id)->where('post_status', 0)->orWhere('post_status', 1)->orWhere('post_status', 3)->orderBy('post_id', 'DESC')->paginate(15);
        return view('admin.my_post.is_not_approved', compact('posts', 'category', 'user'));
    }
    // new post
    public function new_post()
    {
        $categorys_branch = Category::all();
        $categorys = Category::where('category_branch', 0)->get();
        return view('admin.post.new_post', compact('categorys', 'categorys_branch'));
    }
    // them moi 
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
         $slug_name = Post::where('post_slug', $request->post_slug)->doesntExist();
    if ($slug_name) {
        Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'post_status' => 0,
            'censor_status' => 0,
            'post_title' => $request->post_title,
            'post_slug' => $request->post_slug,
            'post_tag' => preg_split('/,/', $request->post_tag),
            'post_intro' => $request->post_intro,
            'post_image' => $file->getClientOriginalName(),
            'post_content' => $request->post_content,
            'post_view' => 0,
        ]);
        return redirect()->action('Admin\Posts@my_index');
    }
        return redirect()->back()->with('error', 'Bài viết có lẽ đã tồn tại');
    }
    // slug
    public function url(Request $request)
    {
        $post_slug = $request->post_title;

        $slug = Str::slug($post_slug, '-');

        return response()->json(['slug' => $slug]);
    }
    // edit
    public function edit($post_slug, $id)
    {
        if ($id) {
            $categorys_branch = Category::all();
            $categorys = Category::where('category_branch', 0)->get();
            $post = Post::find($id);
            return view('admin.post.edit', compact('post', 'categorys', 'categorys_branch'));
        }
      return  abort(404);
    }
    // phe duyet
    public function approval($post_slug, $id)
    {
        if ($id) {
            $categorys_branch = Category::all();
            $categorys = Category::where('category_branch', 0)->get();
            $post = Post::find($id);
            $user = User::all();
            Carbon::setLocale('vi');
            $dt = Carbon::create(substr($post->created_at, 0, 4), substr($post->created_at, 5, 2), substr($post->created_at, 8, 2), substr($post->created_at, 11, 2), substr($post->created_at, 14, 2), substr($post->created_at, 17, 2));
            $now = Carbon::now();
            $date = $dt->diffForHumans($now);
            return view('admin.post.view_post', compact('post', 'categorys', 'categorys_branch','user','date'));
        }
      return  abort(404);
    }
    //
    public function approval_updata(Request $request, $post_id)
    {
        if ($post_id) {
            $posts = Post::find($post_id);
            if ($request->post_status != 0) {
                $posts->post_status = $request->post_status;
                $posts->censor_id = Auth::user()->id;  
            }else{
                if ($request->post_status == 0) {
                    $posts->post_status = 0;
                }
            } 
            $posts->save();
            return redirect()->action('Admin\Posts@my_is_approved');    
        }
      return  abort(404);
    }
    // update
    public function update(Request $request, $post_id)
    {
        $message = [
            'post_title.required' => 'Vui lòng nhập tiêu đề',
            'category_id.required' => 'Vui lòng chọn thể loại',
            'post_slug.required' => 'Url không được để trống',
            'post_intro.required' => 'Vui lòng nhập mô tả ngắn',
            'post_image.image' => 'Vui lòng chọn đúng định dạng ảnh',
            'post_tag.required' => 'Nhập 1 ít thẻ tag',
            'post_content.required' => 'Vui lòng nhập nội dung'
        ];

        $request->validate([
            'post_title' => 'required',
            'category_id' => 'required',
            'post_slug' => 'required|max:255',
            'post_intro' => 'required|max:1000',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'post_tag' => 'required|max:1000',
            'post_content' => 'required',

        ], $message);

        $posts = Post::find($post_id);
        $posts->post_title = $request->post_title;
        $posts->category_id = $request->category_id;
       
        $posts->post_slug = $request->post_slug;
        $posts->post_intro = $request->post_intro;
        if ($request->hasFile('post_image')) {
            $posts->post_image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path('images/post_image'),   $request->file('post_image')->getClientOriginalName());
        }
        $tag = preg_split("/[,]+/", $request->post_tag);

        $posts->post_tag = $tag;
        $posts->post_content = $request->post_content;
        $posts->save();
        return redirect()->action('Admin\Posts@my_index');
    }
    // xoa
    public function delete($id)
    {
         if($id){
            Comment::where('post_id',$id)->delete();
            Post::where('post_id',$id)->delete();
            Post_like::where('post_id',$id)->delete();
            return redirect()->action('Admin\Posts@index');
        } return  abort(404);
    }
    public function delete_my($id)
    {
         if($id){
            Comment::where('post_id',$id)->delete();
            Post::where('post_id',$id)->delete();
            Post_like::where('post_id',$id)->delete();
            return redirect()->action('Admin\Posts@my_index');
        } return  abort(404);
    }
    //tim kiem
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
