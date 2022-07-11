@extends('layouts.todo')

@section('content')
    <h2>Edit the todo !</h2>

    <form action="{!!route('todos.update',['todo'=>$todo])!!}" method="post">
        @csrf
        @method('put')

        <label for="title">Title</label>
        <input id="title" name="title" value="{{old('title') ?? $todo->title}}" minlength="5" maxlength="100" placeholder="title" title="pass a title for your todo" required/>
        @error('title')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="10" maxlength="65535" placeholder="description" title="get description for more details...">{{@old('description') ?? $todo->description}}</textarea>
        @error('description')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
        
        <label for="category">Category</label>
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
    
        <label title="the todo had been done ?">Done:</label>
        <label for="done_yes">Yes</label>
        <input id="done_yes" name="done" type="radio" value="1" @checked(session('_old_input.done') ? session('_old_input.done')==="1" : $todo->done_at !== null)/>
        <label for="done_no">No</label>
        <input id="done_no" name="done" type="radio" value="0" @checked(session('_old_input.done') ? session('_old_input.done')==="0" : $todo->done_at === null)/>
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