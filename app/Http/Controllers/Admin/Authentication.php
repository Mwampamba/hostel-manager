<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\LoginRequest;

class Authentication extends Controller
{
    public function get_login()
    {
        $title = [
            'title' => 'Login'
        ];
        return view('admin.authentication.login', $title);
    }

    public function post_login(LoginRequest $request)
    {
        if (Auth::attempt($request->only([
            'email', 'password'
        ]))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Incorrect email or password.');
        }
    }

    public function get_forgot_password()
    {
        $title = [
            'title' => 'Password recovery'
        ];
        return view('admin.authentication.forget-password', $title);
    }

    public function post_forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $activation_link = route('resetPassword', [
            'token' => $token,
            'email' => $request->email,
        ]);
        $body = "You can reset your password by clicking the link below";

        Mail::send(
            'admin.authentication.email-verification',
            ['activation_link' => $activation_link, 'body' => $body],
            function ($message) use ($request) {
                $message->from('info@uaut.ac.tz', 'Hostel Management System');
                $message->to($request->email, 'Pascal Machabya')
                    ->subject('Get Back Your Password');
            }
        );

        return redirect()->back()->with('success', 'Password recovery link has been sent to your email');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('admin.authentication.update-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $verified_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$verified_token) {
            return back()->withInput()->with('error', 'Activation link is arleady expired!');
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('getLogin')->with('success', 'Password has been changed successfully');
        }
    }
}
