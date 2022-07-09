@extends('layouts.app')

@section('content')
    <h2>Make a todo !</h2>
    <form action="{!!route('todos.store')!!}" method="post">
        
        <label for="title"></label>
        <input id="title" name="title" max="100" placeholder="title" title="title"/>
    
        
        <label for="description"></label>
        <textarea id="description" name="description" rows="20" maxlength="65535" placeholder="description" title="description"></textarea>
    
        
        <label for="category"></label>
        <select id="category" name="category" placeholder="category" title="category">

            @foreach($categories as $category)
                <option value="{{$category->id}}" @checked(session('_old__input.category'))>{{$category->name}}</option>
            @endforeach
            
            <option value="1">game</option>
        </select>
    
    </form>
@endsection