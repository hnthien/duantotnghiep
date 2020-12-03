<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\User;
use Illuminate\Support\Carbon;

class Posts extends Controller
{
    // view post
    public function view_post($post_slug, $id)
    {
        if ($id) {
            $categorys_branch = Category::all();
            $categorys = Category::where('category_branch', 0)->get();
            $user = User::all();

            //post
            $post = Post::find($id);
            if ($post != null) {
                $post->post_view = ($post->post_view) + 1;
                $post->save();

                //like
                Carbon::setLocale('vi');
                $dt = Carbon::create(substr($post->created_at, 0, 4), substr($post->created_at, 5, 2), substr($post->created_at, 8, 2), substr($post->created_at, 11, 2), substr($post->created_at, 14, 2), substr($post->created_at, 17, 2));
                $now = Carbon::now();
                $date = $dt->diffForHumans($now);

                return view('news', compact('post', 'user', 'categorys_branch', 'categorys', 'date'));
            }
        }

        abort(404);
    }

    public function search_post(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword == null or $keyword == " ") {
        } else {
            $user = User::all();
            $search_results = Post::where('post_title', 'like', '%' . $keyword . '%')->orderBy('post_id', 'DESC')->take(10)->get();
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

    public function view_post_category($category_title, $id)
    {

        $user = User::all();
        $categorys = Category::find($id);
        $category_branch = Category::all();
        $post_category = Post::orderBy('post_id', 'DESC')->paginate(9);
        return view('catergories', compact('post_category', 'categorys', 'user', 'category_branch',));
    }
}