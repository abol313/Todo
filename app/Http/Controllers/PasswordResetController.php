<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailPasswordResetRequest;
use App\Http\Requests\UpdatePasswordResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    //
    //Show form of send pasword reset link
    public function request(){
        return view('auth.forgot-password');
    }

    //Send password reset link
    public function email(EmailPasswordResetRequest $request){

        $status = Password::sendResetLink(
            $request->safe()->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('message',[
                'mode' => 'ok',
                'content' => __($status)
            ])
            : back()->withErrors(['email' => __($status)]);
    }

    //Show form of password rest
    public function reset($token){

        return view('auth.reset-password', compact('token'));
    }

    //Reset password
    public function update(UpdatePasswordResetRequest $request){
        // dd($request);
        $status = Password::reset(
            $request->only(['email', 'password', 'password_confirmation', 'token']),
            function($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                
                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));
            }
        );

        return match($status){
            Password::PASSWORD_RESET => to_route('auth.login')->with('message',[
                'mode' => 'ok',
                'content' => __($status)
            ]),

            Password::INVALID_TOKEN => back()->with('message',[
                'mode' => 'warning',
                'content' => __($status)
            ]),

            default => back()->withErrors(['email' => __($status)])
        };
    }
}
