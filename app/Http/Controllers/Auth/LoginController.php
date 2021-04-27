<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }//if you are guest(not logged in) below portion will show otherwise not 


    public function index()
    {
                return view('auth.login');
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if( !auth()->attempt($request->only('email','password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }
        //attempt method wll return a boolean
        

        return redirect()->route('dashboard');
        //->with('status', 'Login success');

    }
}
