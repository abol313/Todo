<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyPasswordConfirmationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmationController extends Controller
{
    //
    
    //Show the password confirmation form
    public function confirm(){
        return view('auth.confirm-password');
    }

    //Confirm the password
    public function verify(VerifyPasswordConfirmationRequest $request){
        if( !Hash::check($request->validated('password'),$request->user()->password) )
            return back()->withErrors([
                'password' => __('auth.password')
            ]);
        
        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }
}
