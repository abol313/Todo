@extends('layouts.todo')

@section('content')
    <x-todo.item :todo="$todo"/>
@endsection