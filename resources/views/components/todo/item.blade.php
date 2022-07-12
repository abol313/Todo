@props([
    'todo'=>null
])

<a href="{{route('todos.edit',['todo'=>$todo])}}" {{$attributes->class('todo-item-container')}}>
    <div class="todo-item">
        <strong>{{$todo->title}}</strong>
    </div>
</a>