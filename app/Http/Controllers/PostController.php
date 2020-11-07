<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $posts = Post::all();
        return view('admin.post.index',compact('posts','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categorys = Category::all();
        return view('admin.post.new_post',compact('categorys'));
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
            'post_title'=> 'required',
            'category_id'=>'required',
            'post_slug'=>'required',
            'post_intro'=>'required',
            'post_tag'=>'required',
            'post_content'=>'required',

        ]);
        $posts = new Post();
        $posts->post_title = $request->post_title;
        $posts->category_id = $request->category_id;
        $posts->post_slug = $request->post_slug;
        $posts->post_intro = $request->post_intro;
        $posts->post_tag = $request->post_tag;
        $posts->post_content = $request->post_content;
        $posts->save();
        return redirect(url('admin/post/'));

    }

    public function create_posts(){
        $categorys = Category::all();
        return view('admin.post.new_post',compact('categorys'));
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
    public function edit($id)
    {
        $categorys = Category::all();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','categorys'));
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
            'post_title'=> 'required',
            'category_id'=>'required',
            'post_slug'=>'required',
            'post_intro'=>'required',
            'post_tag'=>'required',
            'post_content'=>'required',
        ]);
        $posts = new Post();
        $posts->post_title = $request->post_title;
        $posts->category_id = $request->category_id;
        $posts->post_slug = $request->post_slug;
        $posts->post_intro = $request->post_intro;
        $posts->post_tag = $request->post_tag;
        $posts->post_content = $request->post_content;
        $posts->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}
