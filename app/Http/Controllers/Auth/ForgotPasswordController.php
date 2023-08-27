<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;



class ForgotPasswordController extends Controller
{
    /**
     * Show the forget password form.
     *
     * @return \Illuminate\View\View
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Handle the form submission for forget password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && ($user->hasRole('Admin') || $user->hasRole('Editor'))) {
            $token = Str::random(64);
    
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            $this->sendResetLinkEmail($request->email, $token);
    
            return back()->with('message', 'We have e-mailed your password reset link!');
        } else {
            return back()->withErrors(['email' => 'You are not authorized to reset the password for this user.']);
        }
    }
    

    // public function submitForgetPasswordForm(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $token = Str::random(64);

    //     DB::table('password_resets')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => Carbon::now()
    //     ]);

    //     $this->sendResetLinkEmail($request->email, $token);

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }

    /**
     * Send the password reset link via email.
     *
     * @param  string  $email
     * @param  string  $token
     * @return void
     */
    private function sendResetLinkEmail($email, $token)
    {
        $url = route('reset.password.get', $token);
    
        Mail::send('email.forgetPassword', ['reset_url' => $url], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset Password');
        });
    }
    

    /**
     * Show the reset password form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Handle the form submission for reset password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function submitResetPasswordForm(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation' => 'required'
    //     ]);

    //     $updatePassword = DB::table('password_resets')
    //         ->where([
    //             'email' => $request->email,
    //             'token' => $request->token
    //         ])
    //         ->first();

    //     if (!$updatePassword) {
    //         return back()->withInput()->with('error', 'Invalid token!');
    //     }

    //     $user = User::where('email', $request->email)
    //         ->update(['password' => Hash::make($request->password)]);

    //     DB::table('password_resets')->where(['email' => $request->email])->delete();

    //     return redirect('/login')->with('message', 'Your password has been changed!');
    // }
  

    public function submitResetPasswordForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|exists:users',
            'password' => 'required|max:30|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_])[^\s]+$/|confirmed',
            'password_confirmation' => 'required'
        ], [
            'password.regex' => 'Password should have more than 8 characters without space, containing at least one alphabet, one number and one special character. For example, "John@123 or marTin-123"',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'This token does not relate to the entered email');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('passwordChanged', 'Your password has been changed successfully!');
    }

}
