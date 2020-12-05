<?php

namespace App\Http\Controllers\Clients;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post_like;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class Posts extends Controller
{
    public function view_post($post_slug, $id)
    {
        $check = Post::where('post_id',$id)->where('post_slug',$post_slug)->first();
        if(!empty($check)){
        $categorys_branch = Category::all();
        $comments = Comment::where('comment_branch', 0)->where('post_id', $id)->get();
        $categorys = Category::where('category_branch', 0)->get();
        $user = User::all();
        //post
        $post = Post::find($id);
        //view
        $blogId = 'blog_' . $id;
        if (!Session::has($blogId)) {
        $post->increment('post_view');
        Session::put($blogId, 1);
        }
        //like
        if (Auth::check()) {
            $post_like = new Post_like();
            $check_user_idd = Post_like::where('user_id', Auth::user()->id)->where('post_id', $id)->doesntExist();
            if ($check_user_idd) {
                $post_like->user_id = Auth::user()->id;
                $post_like->post_id = $id;
                $post_like->post_dislike = 0;
                $post_like->post_like = 0;
                $post_like->save();
            }
        }
        //time
        Carbon::setLocale('vi');
        $dt = Carbon::create(substr($post->created_at, 0, 4), substr($post->created_at, 5, 2), substr($post->created_at, 8, 2), substr($post->created_at, 11, 2), substr($post->created_at, 14, 2), substr($post->created_at, 17, 2));
        $now = Carbon::now();
        $date = $dt->diffForHumans($now);

        return view('news', compact('post', 'user', 'categorys_branch', 'categorys', 'date','comments'));
    }else {
        return abort(404);
    }
    }


    public function view_post_category($category_slug, $id)
    {
        $check = Category::where('category_id',$id)->where('category_slug',$category_slug)->first();
        if(!empty($check)){

            $user = User::all();
            $categorys = Category::find($id);
            $category_branch = Category::all();
            $post_categoryt = Post::where('category_id', $id)->orderBy('post_id', 'DESC')->paginate(10);
            return view('catergories', compact('post_categoryt', 'categorys', 'user', 'category_branch',));
          }else {
             return abort(404);
         }
    }

    //   search_post
    public function search_post(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword == null or $keyword == " ") {
        } else {
            $user = User::all();
            $search_results = Post::where('post_title', 'like', '%' . $keyword . '%')
            ->orWhere('post_intro', 'like', '%' . $keyword . '%')
            ->orderBy('post_id', 'DESC')->take(10)->get();
            return view('search_results', compact('search_results', 'user'));
        }
    }

    public function search_posts(Request $request)
    {

        $keyword = $request->keyword;
        $user = User::all();
        $search_results = Post::where('post_title', 'like', '%' . $keyword . '%')->orderBy('post_id', 'DESC')->take(20)->get();
        return view('search', compact('search_results', 'user', 'keyword'));
    }
    public function search_posts_tag(Request $request, $tag)
    {
        $keyword = $tag;
        $user = User::all();
        $search_results = Post::orderBy('post_id', 'DESC')->get();
        return view('search_tag', compact('search_results', 'user', 'keyword'));
    }
}
