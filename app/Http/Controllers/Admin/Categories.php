<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class Categories extends Controller
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
        $categorys = Category::where('category_branch', 0)->orderBy('category_id', 'DESC')->paginate(9);
        $categorys_branch = Category::orderBy('category_id', 'DESC')->get();
        return view('admin.category.index', compact('categorys', 'categorys_branch'));
    }

    public function new_category()
    {
        return view('admin.category.new_category');
    }
    public function new_category_branch($category_id)
    {
        if ($category_id) {
            $categorys = Category::find($category_id);
            if ($categorys != null) {
                return view('admin.category.new_category_branch', compact('categorys'));
            }
        }
        abort(404);
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
        ]);

        $category_name = Category::where('category_title', $request->category_title)->get();
        if ($category_name == null) {
            Category::create([
                'category_title' => $request->category_title,
                'category_branch' => 0,
                'category_intro' => $request->category_intro,
            ]);
            return redirect()->action('Admin\Categories@index');
        }
        return redirect()->back()->with('error', 'Thể loại đã tồn tại');
    }
    public function create_category_branch(Request $request, $category_id)
    {
        if ($category_id) {
            $message = [
                'category_title.required' => 'Vui lòng nhập tên thể loại'
            ];

            $request->validate([
                'category_title' => 'required',
            ], $message);

            $category_name = Category::where('category_title', $request->category_title)->get();

            if ($category_name == null) {
                Category::create([
                    'category_title' =>  $request->category_title,
                    'category_intro' => $request->category_intro,
                    'category_branch' => $category_id
                ]);

                return redirect()->action('Admin\Categories@index');
            }

            return redirect()->back()->with('error', 'Thể loại đã tồn tại');
        }

        abort(404);
    }

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

    public function update(Request $request, $category_id)
    {
        if ($category_id) {
            $message = [
                'category_title.required' => 'vui lòng nhập tiêu đề thể loại'
            ];

            $request->validate([
                'category_title' => 'required',
            ], $message);
            $categorys = Category::find($category_id);
            $categorys->category_title = $request->category_title;
            $categorys->category_intro = $request->category_intro;
            $categorys->save();
            return redirect()->action('Admin\Categories@index');
        }

        abort(404);
    }

    public function delete($category_id)
    {
        if ($category_id) {
            $categorys = Category::find($category_id);
            $categorys->delete();
            return redirect()->action('Admin\Categories@index');
        }
        abort(404);
    }
}