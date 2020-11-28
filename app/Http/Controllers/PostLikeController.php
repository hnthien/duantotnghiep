<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_like;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_like(Request $request ,$id)
    {
        $like = $request->like;
        $post_like = Post_like::find($request->id_like);
        $post_like->user_id = Auth::user()->id;
        $post_like->post_id = $id;
        if ($like == 2) {
            $post_like->post_dislike = 1;
            $post_like->post_like = 0;
        } else {
            if ($like == 1) {
                $post_like->post_dislike = 0;
                $post_like->post_like = 1;
            }else{
                if ($like==0) {
                    $post_like->post_dislike = 0;
                    $post_like->post_like = 0;
                }
            }

            
        }
        $post_like->save();
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_like(Request $request , $id)
    {   
         $post = Post::find($id);
         $post_like = Post_like::where('post_id',$id)->get();
        return view('post_like',compact('post_like','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search_posts_tag(Request $request,$tag)
    {
        $keyword = $tag;
        $user = User::all();
        $search_results = Post::where('post_tag', 'like', '%' . $tag . '%')->orderBy('post_id', 'DESC')->take(20)->get();
        return view('search', compact('search_results', 'user', 'keyword'));

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
