@extends('layouts.auth')

@section('class','verify-email')

@section('content')
    <h2>Your email is not verified yet!</h2>
    <h2>Email verification have been sent, open email and click on verification url</h2>
    <h3>You can resend the email verification !</h3>

    
    @if($msg = session()->pull('message'))
        <div class="msg msg-{{$msg['mode']}}">
            <h3>{{$msg['content']}}</h3>
        </div>
    @endif

    <form action="{{route('verification.send')}}" method="post">
        @csrf
        <input type="submit" value="Resend"/>
    </form>
@endsection