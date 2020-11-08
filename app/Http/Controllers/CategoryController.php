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
        $categorys = Category::all();
        return view('admin.category.index', compact('categorys'));
            
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.new_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
            'category_branch' => 'required',
            'category_intro' => 'required',
        ]);
        $ca = new Category([
        'category_title' => $request->get('category_title'),
        'category_branch' => $request->get('category_branch'),
        'category_intro' => $request->get('category_intro'),
        ]);
        $ca->save();
        return view('admin.category.index');
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
        $categorys->category_title = $request->get('category_title');
        $categorys->category_branch = $request->get('category_branch');
        $categorys->category_intro = $request->get('category_intro');
        $categorys->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $categorys = Category::find($category_id);
        $categorys->delete();
        return redirect()->route('category.index');
    }
}
