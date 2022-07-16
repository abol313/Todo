<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninAuthRequest;
use App\Http\Requests\SignupAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    //

    //Show the register page to register a new user
    public function register(){
        return view('auth.register');
    }

    //Show the login page
    public function login(){
        return view('auth.login');
    }

    //Register the new user
    public function signup(SignupAuthRequest $request){
        Auth::login(
            User::create(
                [
                    'email'=>$request->input('email'),
                    'name'=>$request->input('name'),
                    'password'=>Hash::make($request->input('password')),
                ]
            )
        ,$request->input('remember',false));
        
        return redirect()->intended(back()->getTargetUrl());
    }

    //Login the user
    public function signin(SigninAuthRequest $request){
        $authAttempt = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ],$request->input('remember',false));
    
        if(!$authAttempt)
            return back()->withErrors(['password'=>__('auth.password')]);

        return redirect()->intended(back()->getTargetUrl());
    }

    //Logout the user
    public function logout(){
        Auth::logout();
        return back();
    }
}