@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container bg-white text-dark p-2">
                <div class="d-flex flex-row p-2">
                    <div class="d-flex justify-content-start h1 px-2">Dashboard</div>
                    <div class="d-flex justify-content-end h5 align-items-center">{{ __('You are logged in!') }}</div>
                </div>

                <div class="py-2">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create a Post</a>
                </div>

                <div class="py-2">
                    <h2>My Posts</h2>
                </div>

                <div class="well">
                    @if ($posts->count())
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                                    <td><div class="d-flex flex-row">
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

                                    <div class="pt-3 pr-2">
                                        <span>{{ $post->likes->count() }}
                                            {{ Str::plural('like', $post->likes->count()) }}</span>
                                    </div>
                                    </div>
</td>
                                    <td><a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- @if ($post->ownedBy(auth()->user())) --}}
                                {{-- @can('action', $post) --}}

                                {{-- @endcan --}}


                                {{-- @endif --}}
                </div>

                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
                @endif
            </div>

        </div>
    
    </div>
@endsection
