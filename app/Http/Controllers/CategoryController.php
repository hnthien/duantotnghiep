<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::where('category_branch',0)->orderBy('category_id','DESC')->paginate(9);
        $categorys_branch = Category::orderBy('category_id','DESC')->get();
        return view('admin.category.index', compact('categorys','categorys_branch'));
            
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_category()
    {
        return view('admin.category.new_category');
    }
    public function new_category_branch($category_id)
    {
        $categorys = Category::find($category_id);
        return view('admin.category.new_category_branch',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_category(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
        ]);
        $categorys = new Category();
        $categorys->category_title = $request->category_title;
        $categorys->category_intro = $request->category_intro;
        $categorys->category_branch = 0;     
        $categorys->save();
        return redirect()->action('CategoryController@index');
    }
    public function create_category_branch(Request $request , $category_id)
    {
        $request->validate([
            'category_title' => 'required',
        ]);
        $categorys = new Category();
        $categorys->category_title = $request->category_title;
        $categorys->category_intro = $request->category_intro;    
        $categorys->category_branch = $category_id; 
        $categorys->save();
        return redirect()->action('CategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $categorys = Category::find($category_id);
        return view('admin.category.edit',compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'category_title' =>'required',
        ]);
        $categorys = Category::find($category_id);
        $categorys->category_title = $request->category_title;
        $categorys->category_intro = $request->category_intro;
        $categorys->save();
        return redirect()->action('CategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($category_id)
    {
        $categorys = Category::find($category_id);
        $categorys->delete();
        return redirect()->action('CategoryController@index');
    }
}
