@extends('layouts.app')

@push('styles')
    @vite('resources/css/auth.css')
@endpush

@section('title','Authentication')

@section('class','category')

@section('header')
    <h1>Authentication</h1>
@endsection

@section('navbar')
    <li>
        <a href="{{route('todos.index')}}">
            <h2>Go To Home</h2>
        </a>
    </li>

    <li>
        <a href="{{route('auth.register')}}">
            <h2>Sign up</h2>
        </a>
    </li>

    <li>
        <a href="{{route('auth.login')}}">
            <h2>Sign in</h2>
        </a>
    </li>
@endsection

@section('sidebar')

@endsection

@section('content')

@endsection

