@extends('layouts.app')

@section('content')
    <x-todo.item :todo="$todo"/>
@endsection