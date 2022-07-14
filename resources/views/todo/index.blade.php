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
        <h2>Filter Todos</h2>
        <div class="categories">
            <h3>Categories</h3>
            <form action="{{route('todos.filter')}}">
                <div class="items custom-scroll">
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
                </div>
                <input type="reset" onclick="document.querySelectorAll('.todo-filter-category').forEach(v => v.removeAttribute('checked'))" value="Clear"/>
                <input type="submit" value="Filter"/>

            </form>
        </div>
    </div>
@endsection