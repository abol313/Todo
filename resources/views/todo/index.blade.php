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
            <input id="todo-filter-category-{{$category->name}}" name="filter[categories][]" value="{{$category->id}}" type="checkbox" title="filter todos with category {{$category->name}}" @checked(in_array($category->id,session('todo.filter.categories',[])))/> 
        @endforeach

        <input type="submit" value="filter"/>

    </form>

@endsection