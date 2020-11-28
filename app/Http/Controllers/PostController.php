<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = User::all();
        $category = Category::all();
        $comments = Comment::all();
        $posts = Post::orderBy('post_id', 'DESC')->paginate(9);
        return view('admin.post.index',compact('posts','category','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_post()
    {    $categorys_branch = Category::all();
        $categorys = Category::where('category_branch',0)->get();
        return view('admin.post.new_post',compact('categorys','categorys_branch'));
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
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag'=>'required',
            'post_content'=>'required',

        ]);
        $posts = new Post();
        $posts->post_title = $request->post_title;
        $array_category_id = array();
        foreach ($request->category_id as $category_id) {          
            array_push($array_category_id, $category_id);
        }
        $posts->category_id = $array_category_id;
        $posts->user_id = Auth::user()->id;
        $posts->post_slug = $request->post_slug;
        if($request->post_status ==1 ){
            $posts->post_status = $request->post_status;
        }else{
            $posts->post_status = 0;
        }
        $posts->censor_status= 0;
        $posts->post_view = 0;
        $posts->post_intro = $request->post_intro;       
        $file = $request->file('post_image');
        $posts['post_image'] = $file->getClientOriginalName();
        $file->move(public_path('images/post_image'), $file->getClientOriginalName());
        $posts->post_tag = preg_split('/,/',$request->post_tag);
        $posts->post_content = $request->post_content;
        $posts->save();
        return redirect()->action('PostController@index');

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
    public function url(Request $request)
    {
         $categoryname = $request->post_title;

         $slug = Str::slug($categoryname,'-');

         return response()->json(['slug'=>$slug]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_slug,$id)
    {
        $categorys_branch = Category::all();
        $categorys = Category::where('category_branch',0)->get();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','categorys','categorys_branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post_id)
    {
        $array_category_id = array();
        foreach ($request->category_id as $category_id) {          
            array_push($array_category_id, $category_id);
        }
        $request->validate([
            'post_title'=> 'required',
            'category_id'=>'required',
            'post_slug'=>'required',
            'post_intro'=>'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag'=>'required',
            'post_content'=>'required',
        ]);
        $posts =Post::find($post_id);
        $posts->post_title = $request->post_title;
        $posts->category_id = $array_category_id;
        $posts->user_id = Auth::user()->id;
        if($request->post_status ==1 ){
            $posts->post_status = $request->post_status;
        }else{
            $posts->post_status = 0;
        }
        $posts->post_slug = $request->post_slug;
        $posts->post_intro = $request->post_intro;
        if ($request->hasFile('post_image')) {
            $posts->post_image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path('images/post_image'),   $request->file('post_image')->getClientOriginalName());           
        }

        $posts->post_tag = preg_split('/,/',$request->post_tag);;
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
            if($keyword == null or $keyword == " "){
    
            }else{
                $user = User::all();
                $search_results = Post::where('post_title','like','%'.$keyword.'%')->orderBy('post_id', 'DESC')->get();    
                return view('admin.post.search_results',compact('search_results','user'));
            }  
    }
    public function view_post($post_slug,$id)
     {  
        $categorys_branch = Category::all();
        $comments = Comment::all();
        $user = User::all();
        $post = Post::find($id);
        $post->post_view =($post->post_view) + 1;
        $post->save();
        Carbon::setLocale('vi');
        $dt = Carbon::create(substr($post->created_at,0,4),substr($post->created_at,5,2),substr($post->created_at ,8,2),substr($post->created_at ,11,2),substr($post->created_at ,14,2),substr($post->created_at ,17,2));
        $now = Carbon::now();
        $date = $dt->diffForHumans($now);
        return view('news',compact('post','user','categorys_branch','date','comments'));
        // return view('news',compact('post','user','categorys_branch','comments','date'));
    }
    public function view_post_category($category_title,$id)
    {
        $user = User::all();
        $categorys = Category::find($id);
        $category_branch = Category::all();
        $post = Post::orderBy('post_id', 'DESC')->paginate(9);
        return view('catergories',compact('post','categorys','user','category_branch'));
    }
    public function view_post_category_branch($category_title,$id)
    {
        $user = User::all();
        $category_branch = Category::find($id);
        $categorys = Category::all();
        $post = Post::orderBy('post_id', 'DESC')->paginate(9);
        return view('catergories_branch',compact('post','user','category_branch','categorys'));
    }
}
