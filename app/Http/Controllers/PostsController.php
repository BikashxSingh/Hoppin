<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth'])->only(['create','store', 'edit', 'update','destroy']);

        $this->middleware(['auth'])->except('index', 'show');
        //middleware is also used for csrf protection HERE at controller level
    }

    public function index() //Post $posts)
    {
        //$posts = Post::get(); //Collection //all posts //this type of collection used for showing data without parameter like id

        $posts = Post::orderBy('updated_at', 'desc')->with(['user', 'likes'])->paginate(5); //eager loading user & like , since Post model has User relationship and likes relationship, also posts.index is accesing user & likes  

        // $posts = $posts->orderBy('updated_at', 'desc')->with(['user', 'likes'])->paginate(5);

        //above is eloquent ,so we can use where, find etc.
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'myfile' => 'image|nullable|max:1999',
        ]);

        //Handle file upload
        if ($request->hasFile('myfile')) {
            //Get Filename with extension
            $fileNameWithExt = $request->file('myfile')->getClientOriginalName();
            //Get just filename //no laravel helper class so Pure PHP
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('myfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('myfile')->storeAs('public/myfiles', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // below method is for one post {or  more } per user type// user_id = auth()->id() used so can use many relationships and make user_id fillable in Post model

        // Post::create([
        //     'user_id' => auth()->user()->id, //or auth()->id()
        //     'title' => $request->title,
        //      'body' => $request->body
        // ]);

        //below An eloquent relationships
        // auth()->user()->posts()->create($request->only('title', 'body'));

        //OR here
        $request->user()->posts()->create([
            //user_id is filled automatically
            'title' => $request->title,
            'body' => $request->body,

            'myfile' => $fileNameToStore,
        ]);
        
        
        // SAME OR

        //request is for requesting data inside the table like posts table ' s title, body OR requesting authenticated/validated user
        // $request->user()->posts()->create($request->only('title', 'body'));
        

        return redirect(route('posts.index'));
    }

    //Request $request is used for altering data in table. Post $post is used for showing or aletring entire table of a post
    //Laravel provides custom form requests to validate the request data before they arrived into the controller.

    public function edit(Post $post) //Post $post type instead of $id type is used for Route Model Binding
    {

        // if (!$post->ownedBy(auth()->user())){
        //     return back()->with('error', 'Unauthorized page');
        // }
        $this->authorize('action', $post);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post) //inside () $id
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'myfile' => 'image|nullable|max:1999',
        ]);

        //Handle file upload
        if ($request->hasFile('myfile')) {
            //Get Filename with extension
            $fileNameWithExt = $request->file('myfile')->getClientOriginalName();
            //Get just filename //no laravel helper class so Pure PHP
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('myfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('myfile')->storeAs('public/myfiles', $fileNameToStore);
        }

    
    //request find the authenticated user id and match it// post->id find the post of auth user 
        // $request->user()->posts()->find($post->id)->update($request->all());
        // if ($request->hasFile('myfile')) {
        //     $request->user()->posts()->find($post->id)->update(['myfile' => $fileNameToStore]);
        // }

//OR SAME BUT LONG METHOD
           $request->user()->posts()->find($post->id)->update([
            //user_id is filled automatically
            'title' => $request->title,
            'body' => $request->body,

        ]);
         if($request->hasFile('myfile')){
             $request->user()->posts()->find($post->id)->update(['myfile' => $fileNameToStore]);}


//OR        //$post->update($request->all());

//OR
        //  $post = Post::find($id);
        //  $post->update($request->all());

        //   Post::find($post->id)->update($request->all());

        //   Post::where('id', $id)->update($request->all());

        //   Post::find($id)->fill($request->all())->save();

        return redirect(route('posts.index'));
    }

    public function destroy(Post $post)
    {
        // if (!$post->ownedBy(auth()->user())){
        //     return back()->with('error', 'Unauthorized page');
        // }

        $this->authorize('action', $post); //policy

        if($post->myfile != 'noimage.jpg'){
            Storage::delete('public/myfiles/'.$post->myfile);
        }
        $post->delete();

        return back();
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
