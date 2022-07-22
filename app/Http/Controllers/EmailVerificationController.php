<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    //Show view to unverified email users, and notice to verify
    public function notice(){
        return view('auth.verify-email');
    }

    //Verify email
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('todos.index');
    }

    //Send email verification
    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message',['mode'=>'ok','content'=>'Sent the email verification !']);
    }

    
}
