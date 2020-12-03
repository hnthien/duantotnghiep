<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post_like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikes extends Controller
{
    public function post_like(Request $request, $id)
    {
        if ($id) {
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
                } else {
                    if ($like == 0) {
                        $post_like->post_dislike = 0;
                        $post_like->post_like = 0;
                    }
                }
            }
            $post_like->save();
            return;
        }

        abort(404);
    }

    public function view_like(Request $request, $id)
    {
        if ($id) {
            $post = Post::find($id);
            if ($post == true) {
                $post_like = Post_like::where('post_id', $id)->get();
                return view('post_like', compact('post_like', 'post'));
            }
        }
        abort(404);
    }
}