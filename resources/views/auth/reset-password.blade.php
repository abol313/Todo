@extends('layouts.auth')

@section('class','auth-register')

@section('content')
    <h2>Reset Password !</h2>
    <form action="{!!route('password.update')!!}" method="post">
        @csrf

        @if($msg = session()->pull('message'))
        <div class="msg msg-{{$msg['mode']}}">
            <h3>{{$msg['content']}}</h3>
        </div>
        @endif

        <label for="email">User Email</label>
        <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="Give your email" title="pass your email" autocomplete="username" required/>
        @error('email')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror


        <label for="password">User New Password</label>
        <input id="password" name="password" type="password" value="{{old('password')}}"  minlength="8" placeholder="Give a password" title="pass a password at least one of each lower and upper letters and numbers and symbols" autocomplete="new-password" required/>
        @error('password')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror


        <label for="password_confirmation">Retype User New Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" placeholder="Retype your password" title="retype the password exactly !" autocomplete="new-password" required/>
        @error('password_confirmation')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="hidden" name="token" value="{{$token}}"/>

        <input type="submit" value="Reset !"/>

    </form>
@endsection