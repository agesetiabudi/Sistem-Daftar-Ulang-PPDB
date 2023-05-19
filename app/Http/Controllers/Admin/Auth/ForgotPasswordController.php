<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ForgotPasswordAdminNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showForgetPasswordForm()
    {
        return view('backend.auth.passwords.email');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        $input = Admin::where('email', $request->email)->first();

        if(!$input){
            return back()->with('error', 'Email tersebut belum terdaftar');
        } else {

            $token = Str::random(90);

            DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );

            Notification::send($input, new ForgotPasswordAdminNotification($token, $request->email));
            
            return back()->with('message', 'We have e-mailed your password reset link!');
        }

    }

    public function showResetPasswordForm(Request $request) { 
        return view('backend.auth.passwords.reset', ['token' => $request->token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Admin::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/admin/login')->with('message', 'Your password has been changed!');
    }
}
