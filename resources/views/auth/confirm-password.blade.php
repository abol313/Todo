@extends('layouts.auth')

@section('class','auth-login')

@section('content')
    <h2>Confirm Password ! [This section is protected]</h2>
    <form action="{!!route('password.verify')!!}" method="post">
        @csrf

        <label for="password">User Password</label>
        <input id="password" name="password" type="password" value="{{old('password')}}"  minlength="8" placeholder="Give your password" title="pass a password at least one of each lower and upper letters and numbers and symbols" autocomplete="new-password" required/>
        @error('password')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Login !"/>

    </form>
@endsection