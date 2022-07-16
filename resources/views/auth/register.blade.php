@extends('layouts.auth')

@section('class','auth-register')

@section('content')
    <h2>Register !</h2>
    <form action="{!!route('auth.signup')!!}" method="post">
        @csrf

        <label for="name">User As Name</label>
        <input id="name" name="name" value="{{old('name')}}" placeholder="Give your full/alias name " title="pass your name" autocomplete="nickname" required/>
        @error('name')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <label for="email">User Email</label>
        <input id="email" name="email" type="email" value="{{old('email')}}" placeholder="Give your email" title="pass your email" autocomplete="username" required/>
        @error('email')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror


        <label for="password">User Password</label>
        <input id="password" name="password" type="password" value="{{old('password')}}"  minlength="8" placeholder="Give a password" title="pass a password at least one of each lower and upper letters and numbers and symbols" autocomplete="new-password" required/>
        @error('password')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror


        <label for="re_password">Retype User Password</label>
        <input id="re_password" name="re_password" type="password" minlength="8" placeholder="Retype your password" title="retype the password exactly !" autocomplete="new-password" required/>
        @error('re_password')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <div class="custom-form-checker">
            <label for="remember">Remember Me</label>
            <input id="remember" name="remember" type="checkbox" value="1" title="remembered next times" @checked(old('remember')==true)/>
        </div>
        @error('remember')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Register !"/>

    </form>
@endsection