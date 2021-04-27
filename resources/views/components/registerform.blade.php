{{--e.g @props(['user' = '$user']) if there are any props --}}


<div class="card bg-secondary text-center card-form">
    <div class="card-header"><h3>Register Now</h3></div>
    <div class="card-body">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name"
                    class="form-control form-control-lg @error('name') border-warning @enderror"
                    value="{{ old('name') }}" placeholder="Full Name">
                @error('name')
                    <div class="text-warning text-sm text-left mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username"
                    class="form-control form-control-lg @error('username') border-warning @enderror"
                    value="{{ old('username') }}" placeholder="Username">
                @error('username')
                    <div class="text-warning text-sm text-left mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password"
                    class="form-control form-control-lg  @error('password_confirmation') border-warning @enderror"
                    placeholder="Password Confirmation!">
                @error('password_confirmation')
                    <div class="text-warning text-sm text-left mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Register"
                    class="btn bg-custom-1 btn-outline-success btn-block">
            </div>
            {{-- <button type="submit" class="btn bg-custom-1 btn-outline-success btn-block">Submit</button> --}}
        </form>
    </div>
</div>