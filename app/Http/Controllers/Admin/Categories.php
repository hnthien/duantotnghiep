<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Models\Post;
class Categories extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 3 || $this->role_user == 1) {
                return $next($request);
            }else{
                    App::abort(404);
            }
            
            
            
        });
    }
    // home category
    public function index()
    {
        $categorys = Category::where('category_branch', 0)->orderBy('category_id', 'DESC')->paginate(9);
        $categorys_branch = Category::orderBy('category_id', 'DESC')->get();
        return view('admin.category.index', compact('categorys', 'categorys_branch'));
    }
    // slug
    public function url(Request $request)
    {
        $category_slug = $request->category_title;
        $slug = Str::slug($category_slug, '-');
        return response()->json(['slug' => $slug]);
    }
    // new category
    public function new_category()
    {
        return view('admin.category.new_category');
    }
    // new category branch
    public function new_category_branch($category_id)
    { if ($category_id) {
        $categorys = Category::find($category_id);
        return view('admin.category.new_category_branch', compact('categorys'));
    }
    abort(404);
    }
    // them moi category
    public function create_category(Request $request)
    {
        $message = [
            'category_title.required' => 'Vui lòng nhập tên thể loại',
            'category_slug.required' => 'Vui lòng nhập url'
        ];

        $request->validate([
            'category_title' => 'required',
            'category_slug' => 'required',
        ], $message);

        $category_name = Category::where('category_title', $request->category_title)->doesntExist();
        if ($category_name ) {
            Category::create([
                'category_title' => $request->category_title,
                'category_slug' => $request->category_slug,
                'category_branch' => 0,
                'category_intro' => $request->category_intro,
            ]);
            return redirect()->action('Admin\Categories@index');
        }
        return redirect()->back()->with('error', 'Thể loại đã tồn tại');
    }

    // them moi category con
    public function create_category_branch(Request $request, $category_id)
    {
        $category_name = Category::where('category_title', $request->category_title)->doesntExist();
        if ($category_name) {
            $message = [
                'category_title.required' => 'Vui lòng nhập tên thể loại',
                'category_slug.required' => 'Vui lòng nhập url'
            ];

            $request->validate([
                'category_title' => 'required',
                'category_slug' => 'required',
            ], $message);
            
            if ($category_id != null) {
                Category::create([
                    'category_title' => $request->category_title,
                    'category_slug' => $request->category_slug,
                    'category_intro' => $request->category_intro,
                    'category_branch' => $category_id
                ]);
                return redirect()->action('Admin\Categories@index');
            }
            abort(404); 
        }else{
            return redirect()->back()->with('error', 'Thể loại đã tồn tại');
        }

        abort(404);
    }
    //edit
    public function edit($category_id)
    {
        if ($category_id) {
            $categorys = Category::find($category_id);
            if ($categorys != null) {
                return view('admin.category.edit', compact('categorys'));
            }
        }
        abort(404);
    }

    public function update(Request $request,$slug, $category_id)
    {
        $check = Category::where('category_id', $category_id)->where('category_slug', $slug)->first();
        if ($category_id) {
            if (!empty($check)) {
            $message = [
                'category_title.required' => 'vui lòng nhập tiêu đề thể loại'
            ];

            $request->validate([
                'category_title' => 'required',
                'category_slug' => 'required'
            ], $message);
            $categorys = Category::find($category_id);
            $categorys->category_title = $request->category_title;
            $categorys->category_intro = $request->category_intro;
            $categorys->category_slug = $request->category_slug;
            $categorys->save();
            return redirect()->action('Admin\Categories@index');
        } else {
            return abort(404);
        }
        }

        abort(404);
    }

    public function delete($category_id)
    {
        if ($category_id) {
            Category::where('category_id',$category_id)->orWhere('category_branch',$category_id)->delete();
            Post::where('category_id',$category_id)->delete(); 
            return redirect()->action('Admin\Categories@index');
        }
        abort(404);
    }
}
