@extends('layouts.todo')

@section('class','todo-create')

@section('content')
    <h2>Make a todo !</h2>
    <form action="{!!route('todos.store')!!}" method="post">
        @csrf

        <label for="title">Title</label>
        <input id="title" name="title" value="{{old('title')}}" minlength="5" maxlength="100" placeholder="title" title="pass a title for your todo" required/>
        @error('title')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="10" maxlength="65535" placeholder="description" title="get description for more details...">{{@old('description')}}</textarea>
        @error('description')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
        
        <label for="category">Category</label>
        <select id="category" name="category" placeholder="category" title="select your category">
            <option value="" @selected(session('_old_input.category') === null)>- No category -</option>

            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(session('_old_input.category') == $category->id)>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
    
        <input type="submit" value="Make !"/>

    </form>

@endsection