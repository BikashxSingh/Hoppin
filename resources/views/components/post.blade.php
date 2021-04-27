@props(['post' => $post])

<div>
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="/storage/myfiles/{{ $post->myfile }}"><img src="/storage/myfiles/{{ $post->myfile }}" style="max-width: 100%;
                max-height: 100%;"></a>
            </div>
            <div class="col-md-8 col-sm-8">
                <a href="{{ route('users.posts.index', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                <span class="text-dark text-sm ml-2 pt-2">{{ $post->created_at->diffForHumans() }}</span>
                <h3 class="mb-1"> <a href="{{ route('posts.show', $post) }}"> {{ $post->title }}</a>
                </h3>
                <p class="mb-2"> {{ $post->body }}</p>
        
        
                <div class="d-flex flex-row">
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                            <div class="p-2">
                                <form action="{{ route('posts.likes', $post) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-outline-light border-0 bg-transparent text-primary">Like</button>
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
        
        
        
        
                    {{-- OR Model Relationship method
                    @auth
                    @if ($post->ownedBy(auth()->user())) --}}
        
                    {{-- OR auth helper method
                    @auth
                    @if (auth()->user()->id == $post->user_id) --}}
        
                    {{-- OR there is other facade method --}}
        
                    {{-- OR using policy --}}
                    @can('action', $post)
                        <div class="p-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
        
                        </div>
                        <div class="p-2">
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf{{-- csrf do uri protection, csrf has to be used on form while POST --}}
                                {{-- hidden method --}}
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
        
        
                    @endcan
        
                </div>
            </div>
        </div>
        


    </div>
</div>
