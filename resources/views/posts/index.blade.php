@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container py-2 bg-white text-dark">
                <h1>Posts</h1>

                @auth
                    <div class="py-2">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create a Post</a>
                    </div>
                @endauth


                <div class="well">
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-post :post="$post" />
                           {{-- here component with prop--}}
                            {{-- <x-NAMEOFTHECOMPONENT PROPi.e. :THINGWEWANTTOUSEWITHINTHECOMPONENT='$THINGWEWANTTOUSEWITHINTHECOMPONENT' --}}

                        @endforeach

                        {{ $posts->links() }}
                    @else
                        <p>There are no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
