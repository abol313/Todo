@extends('layouts.todo')

@section('class','todo-show')

@section('content')
    <x-todo.item :todo="$todo"/>
@endsection