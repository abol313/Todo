@extends('layouts.todo')

@section('content')
    @forelse($todos as $todo)
        <x-todo.item :todo="$todo"/>
    @empty
        <h3>No todo!</h3>
    @endforelse
@endsection

@section('sidebar')
    <div class="filter">
        <div class="categories">
            <form action="{{route('todos.filter')}}">

                <div class="category">
                    <label for="todo-filter-no-category">No category</label>
                    <input id="todo-filter-no-category" class="todo-filter-category" name="filter[categories][]" value="" type="checkbox" title="filter todos with no category" @checked( in_array(null, session('todo.filter.categories') ?? [], true))/> 
                </div>
                @foreach($categories as $category)
                    <div class="category">
                        <label for="todo-filter-category-{{$category->name}}">{{$category->name}}</label>
                        <input id="todo-filter-category-{{$category->name}}" class="todo-filter-category" name="filter[categories][]" value="{{$category->id}}" type="checkbox" title="filter todos with category {{$category->name}}" @checked(in_array($category->id.'',session('todo.filter.categories') ?? [], true))/> 
                    </div>
                @endforeach

                <input type="reset" onclick="document.querySelectorAll('.todo-filter-category').forEach(v => v.removeAttribute('checked'))" value="Clear"/>
                <input type="submit" value="filter"/>

            </form>
        </div>
    </div>
@endsection