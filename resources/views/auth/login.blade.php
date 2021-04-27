@extends('layouts.app')

@section('content')
    <div class="dark-overlay2">
        <div class="home-inner2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card bg-secondary text-center card-form">
                            <div class="card-header">
                                <h3>Login Here</h3>
                            </div>
                            <div class="card-body">
                               

                                @if (session('status'))
                                    <div class="bg-danger p-2 rounded mb-2 text-warning text-center">
                                        {{ session('status') }}
                                    </div>

                                @endif

                                {{-- OR 
                                    @if (session()->has('status'))
                                    {{ session('status') }}
                                    @endif --}}

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg @error('email') border-warning @enderror"
                                            value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <div class="text-warning text-sm text-left mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg @error('password') border-warning @enderror"
                                            placeholder="Password">
                                        @error('password')
                                            <div class="text-warning text-sm text-left mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember"
                                                class="form-check-input mr-2">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login"
                                            class="btn bg-custom-1 btn-outline-success btn-block">
                                    </div>
                                    {{-- <button type="submit" class="btn-primary btn-outline-white btn-block rounded">Submit</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
