<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    //you can do this in PostsController

    public function __construct()
    {
        $this->middleware('auth'); //for unauthorized access protection
    }

    public function store(Post $post, Request $request) // , $id
    {
        //$post = Post::find($id);

        if ($post->likedBy($request->user())) {
            return response(null, 409); //controller level protection //conflict http code
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);


        //Mail::to($post->user)->send(new PostLiked($request->user(), $post));


        if (!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }



        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
