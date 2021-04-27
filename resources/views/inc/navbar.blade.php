{{-- inside body div#app --}}
<nav class="navbar navbar-expand-sm bg-custom-1 navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" >{{ config('app.name', 'Hoppin') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="{{ __('Toggle Navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link"  href="{{ route('index') }}"><span class="sr-only">(Home )</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/posts">Posts</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Search</a>
                </li>
                
            </ul>

            <ul class="navbar-nav ml-auto">
                {{--you can do @if (auth()->user())
                @else
                @endif
                 OR--}}
                
                @auth

                <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="nav-link">{{ auth()->user()->name }}</a>
                </li> 
                <li>
                    {{-- logout in form for cross site request forgery --}}
                <form action=" {{ route('logout') }} " method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn text-white">Logout</button>
                </form>
                </li>   
                {{-- <li class="nav-item active">
                    <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                </li> --}}
    
                @endauth
                
                @guest
                
                <li class="nav-item active">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li> 
               <li class="nav-item active">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>

                @endguest                
                
                
                
                
            </ul>
        </div>
    </div>
</nav>

{{-- main content --}}