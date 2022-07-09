@extends('layouts.app')

@section('content')
    <h2>Make a todo !</h2>
    <form action="{!!route('todos.store')!!}" method="post">
        @csrf

        <label for="title">Title</label>
        <input id="title" name="title" minlength="5" maxlength="100" placeholder="title" title="pass a title for your todo" required/>
    
        
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="10" maxlength="5" placeholder="description" title="get description for more details..."></textarea>
    
        
        <label for="category">Category</label>
        <select id="category" name="category" placeholder="category" title="select your category">
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(session('_old_input.category') == $category->id)>{{$category->name}}</option>
            @endforeach
        </select>
    
        <input type="submit" value="Make !"/>

    </form>

@endsection