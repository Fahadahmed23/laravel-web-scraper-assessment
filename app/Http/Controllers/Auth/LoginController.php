<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //use AuthenticatesUsers;
    
    // The redirect path after successful login
    protected $redirectTo = '/login';

    public function __construct()
    {
        // Apply "guest" middleware to all methods except "logout"
        $this->middleware('guest')->except('logout');
    }

     // Show the login form
    public function index(){
        return view('login');
    }

    // Process the login request
    public function login(Request $request)
    {
        // Validate the input fields (email and password)
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the validated email and password
        $email = $request->input('email');
        $password = $request->input('password');

        // Check if the provided credentials are valid
        // Attempt to authenticate the user using the 'admin' guard
        $remember = $request->filled('remember'); // "remember" checkbox in the form
        
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $remember)) {

            $request->session()->regenerate();

            // Redirect to the intended path (pre-login page)
            return redirect()->intended('/');
        }

        // Authentication failed, redirect back with an error message
        return back()->withInput()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);

    }

    // Logout the user
    public function logout(Request $request)
    {
        // Logout the user from the "admin" guard
        Auth::logout();

        // Redirect to the login page
        return redirect()->route('login');
    }


    // Unauthorized access
    public function unauthorizedUser() {

        return view('auth.unauthorized');

    }

    public function logoutUnauthorizedUser(){

     
        // Logout the user from the "admin" guard
        Auth::logout();

        // Redirect to the login page
        return redirect()->route('login');
    }


}
