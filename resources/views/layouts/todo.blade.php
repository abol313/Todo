@extends('layouts.app')

@push('styles')
    @vite('resources/css/category.css')
@endpush

@section('title','Todo Collection')


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
            <h2>List</h2>
        </a>
    </li>

    <li>
        <a href="{{route('todos.create')}}">
            <h2>Make</h2>
        </a>
    </li>
@endsection

@section('sidebar')

@endsection
