@props([
    'todo'=>null
])
@canany(['update', 'delete'], $todo)
    <a href="{{route('todos.edit',['todo'=>$todo])}}" {{$attributes->class('todo-item-container')}}>
        <div @class( ['todo-item', 'todo-item-checked'=>$todo->done_at!==null] ) >
            <strong>{{$todo->title}}</strong>
        </div>
    </a>
@endcanany