@extends('layouts.todo')

@section('content')
    @forelse($todos as $todo)
        <x-todo.item :todo="$todo"/>
    @empty
        <h3>No todo!</h3>
    @endforelse
@endsection

@section('sidebar')

    <form action="{{route('todos.filter')}}">
            
        @foreach($categories as $category)
            <label for="todo-filter-category-{{$category->name}}">{{$category->name}}</label>
            <input id="todo-filter-category-{{$category->name}}" name="categories[]" value="{{$category->name}}" type="checkbox" title="filter todos with category {{$category->name}}" /> 
        @endforeach

        <input type="submit" value="filter"/>

    </form>

@endsection