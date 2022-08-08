@extends('layouts.auth')

@section('class','auth-login')

@section('content')
    <h2>Send Password Reset Link !</h2>
    <form action="{!!route('password.email')!!}" method="post">
        @csrf

        @if($msg = session()->pull('message'))
        <div class="msg msg-{{$msg['mode']}}">
            <h3>{{$msg['content']}}</h3>
        </div>
        @endif

        <label for="email">User Email</label>
        <input id="email" name="email" type="email" value="{{old('email')}}"  minlength="8" placeholder="Give your email" title="the reset link will be sent to your email" autocomplete="username" required/>
        @error('email')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Send Link !"/>

    </form>
@endsection