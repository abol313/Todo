@extends('layouts.todo')

@section('class','todo-edit')

@section('content')
    <h2 class="title">Edit the todo !</h2>

    <form action="{!!route('todos.update',['todo'=>$todo])!!}" method="post">
        @csrf
        @method('put')

        <label for="title">Todo Title</label>
        <input id="title" name="title" value="{{old('title') ?? $todo->title}}" minlength="5" maxlength="100" placeholder="title" title="Pass a title to have a bit of info" required/>
        @error('title')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <label for="description">Todo Description</label>
        <textarea id="description" name="description" rows="10" maxlength="65535" placeholder="description" title="Explain more about your task...">{{@old('description') ?? $todo->description}}</textarea>
        @error('description')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
        
        <label for="category">Todo Category</label>
        <select id="category" name="category" placeholder="category" title="select your category">
            <option value="" @selected(session('_old_input.category') === null)>- No category -</option>

            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(session('_old_input.category') == $category->id || $todo->category == $category->id)>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
    
        <label title="the todo had been done ?">Todo've Been Done</label>
        <div class="done">
            <label for="done_yes">Yes</label>
            <input id="done_yes" name="done" type="radio" value="1" @checked(session('_old_input.done') ? session('_old_input.done')==="1" : $todo->done_at !== null)/>
            <input id="done_no" name="done" type="radio" value="0" @checked(session('_old_input.done') ? session('_old_input.done')==="0" : $todo->done_at === null)/>
            <label for="done_no">No</label>
        </div>
        @error('done')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror



        <input type="submit" value="Edit !"/>

    </form>
    
    <h2>Delete the todo !</h2>

    <form action="{!!route('todos.destroy',['todo'=>$todo])!!}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete !"/>
    </form>
@endsection