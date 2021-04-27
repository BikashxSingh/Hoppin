<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } //if you are user(logged in) below portion will show otherwise redirected to  login 

    //First method

    public function index(Request $request)
    {
        //$user = auth()->user(); OR

        //Here Request to authenticated/validated user {$request OR auth() } 
        $posts = $request->user()->posts()->orderBy('updated_at', 'desc')->paginate(2);
        
        return view('dashboard', [
            'posts' => $posts
        ]);
    }

    //Second method

    // public function index()
    // {
    //     //Auth :: , Post:: -  are facades 
    //     $user = Auth::user();
    //     $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(2);
    //     return view('dashboard', [
    //         'user' => $user,
    //         'posts' => $posts
    //     ]);
    // }


    
    // Third method
   
    // public function index()
    // {
    //     // auth() is helper class//function
    //     $posts = auth()->user()->posts()->orderBy('created_at', 'desc')->paginate(2);
        
    //     return view('dashboard', [
    //         'posts' => $posts
    //     ]);
    // }

    
    // Fourth method 

    // public function index()
    // {   
    //     $user = auth()->user();
    //     $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(2);
    //     return view('dashboard', [
    //         'user' => $user,
    //         'posts' => $posts
    //     ]);
        
    // } 
    
    //FIFTH method not showing this user's posts //auth user problem
    // public function index(User $user)
    // {
    //     $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(2);
    //     return view('dashboard',[
    //         'user' => $user,
    //         'posts' => $posts
    //     ]);
    // }

}
