@extends('layouts.auth')

@section('class','auth-login')

@section('content')
    <h2>Login !</h2>
    <form action="{!!route('auth.signin')!!}" method="post">
        @csrf

        <label for="email">User Email</label>
        <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="Give your email" title="pass your email" autocomplete="username" required/>
        @error('email')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror


        <label for="password">User Password</label>
        <input id="password" name="password" type="password" value="{{old('password')}}"  minlength="8" placeholder="Give your password" title="pass a password at least one of each lower and upper letters and numbers and symbols" autocomplete="new-password" required/>
        @error('password')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <div class="custom-form-checker">
            <label for="remember">Remember Me</label>
            <input id="remember" name="remember" type="checkbox" value="1" title="remembered next times" @checked(old('remember')==true)/>
        </div>
        @error('remember')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Login !"/>

    </form>
@endsection