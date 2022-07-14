@extends('layouts.app')

@push('styles')
    @vite('resources/css/todo.css')
@endpush

@section('title','Todo Collection')

@section('class','todo')

@section('header')
    <h1>Welcome to Todo Collection !</h1>
@endsection

@section('navbar')
    <li>
        <a href="{{route('categories.index')}}">
            <h2>Go To Categories</h2>
        </a>
    </li>

    <li>
        <a href="{{route('todos.index')}}">
            <h2>List Todos</h2>
        </a>
    </li>

    <li>
        <a href="{{route('todos.create')}}">
            <h2>Make Todo</h2>
        </a>
    </li>
@endsection

@section('sidebar')

@endsection
