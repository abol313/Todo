@props([
    'todo'=>null
])

<a href="{{route('todos.edit',['todo'=>$todo])}}" target="_blank">
    <div class="todo-item">
        <strong>{{$todo->title}}</strong>
    </div>
</a>