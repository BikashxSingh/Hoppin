@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container py-2 bg-white text-dark">
                <div class="py-2">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Go back</a>

                </div>
                {{-- <div class="well">
                    <a href="{{ route('users.posts.index', $post->user) }}"
                        class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-dark text-sm ml-2 pt-2">{{ $post->created_at->diffForHumans() }}</span>
                    <h3 class="mb-1">{{ $post->title }}</h3>
                    <p class="mb-2"> {{ $post->body }}</p>

                    <div class="d-flex flex-row">
                        @auth
                            @if (!$post->likedBy(auth()->user()))
                                <div class="p-2">
                                    <form action="{{ route('posts.likes', $post) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-light border-0
                                                                        bg-transparent text-primary">Like</button>
                                    </form>
                                </div>
                            @else
                                <div class="p-2">
                                    <form action="{{ route('posts.unlikes', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-light border-0 bg-transparent text-primary">Unlike</button>
                                    </form>
                                </div>

                            @endif

                        @endauth

                        <div class="pt-3 pr-2">
                            <span>{{ $post->likes->count() }}
                                {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>

                        @can('action', $post)
                            <div class="p-2">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>

                            </div>
                            <div class="p-2">
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>

                    @endcan
                </div> --}}

                <x-post :post="$post" />

            </div>
        </div>
    </div>
@endsection
