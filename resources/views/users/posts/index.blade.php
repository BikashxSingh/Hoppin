@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container bg-white text-dark p-2">
                <div class="d-flex flex-column">
                    <div class="p-2">
                        <h1>{{ $user->name }}</h1>
                        <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} likes</p>
                    </div>
                    <div class="well">
                        @if ($posts->count())
                            @foreach ($posts as $post)
                                <x-post :post="$post" />
                                {{-- <x-NAMEOFTHECOMPONENT PROPi.e. :THINGWEWANTTOUSEWITHINTHECOMPONENT --}}

                            @endforeach

                            {{ $posts->links() }}
                        @else
                            <p>{{ $user->name }} are no posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
