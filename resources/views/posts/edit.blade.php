
@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container p-2 bg-white text-dark">
                <h1>Edit Post</h1>
                <div class="container m-2">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="my-2">
                                <h1>Title</h1>
                            </label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') border-danger @enderror" placeholder="Enter Title"
                                value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger mt-1 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="body" class="my-2">
                                <h1>Body</h1>
                            </label>
                            <textarea name="body" id="body" rows="4" class="form-control"
                                class="bg-light border-2 w-full p-2 rounded-lg @error('body') border-danger @enderror"
                                placeholder="Write a Post" >{{ $post->body }}</textarea>
                            @error('body')
                                <div class="text-danger mt-1 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="myfile" class="my-2">Select a file: </label>
                            <br>
                            <input type="file" name="myfile" id="myfile" class="form-group">
                            
                        </div>
                        <div>
                            <input type="submit" value="Save" class="btn bg-custom-1 btn-outline-success">
                        </div>
                    </form>
                </div>           
                </div>
            </div>
        </div>
    @endsection
