<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }//if you are guest(not logged in) below portion will show otherwise not 



    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);
    

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);//you can use shortcut method but do long for Hash Facade
    
    //SIGN the user in 
    
    //you can use Auth::user() facade or auth() helper class
    // auth()->attempt([
    //     'email' => $request->email,
    //     'password' => $request->password,
    // ]);

    //Auth::user()->attempt($request->only('email','password'));
    

    auth()->attempt($request->only('email','password'));
    //you can use this method above

    return redirect()->route('dashboard');

    }
}
