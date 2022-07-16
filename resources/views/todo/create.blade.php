@extends('layouts.todo')

@section('class','todo-create')

@section('content')
    <h2>Make a todo !</h2>

    @if($msg = session()->pull('message'))
        <div class="msg msg-{{$msg['mode']}}">
            <h3>{{$msg['content']}}</h3>
        </div>
    @endif

    <form action="{!!route('todos.store')!!}" method="post">
        @csrf

        <label for="title">Todo Title</label>
        <input id="title" name="title" value="{{old('title')}}" minlength="5" maxlength="100" placeholder="Pass a title to have a bit of info" title="pass a title for your todo" required/>
        @error('title')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <label for="description">Todo Description</label>
        <textarea id="description" name="description" rows="10" maxlength="65535" placeholder="Explain more about your task..." title="get description for more details...">{{@old('description')}}</textarea>
        @error('description')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
        
        <label for="category">Todo Category</label>
        <select id="category" name="category" placeholder="category" title="select your category">
            <option value="" @selected(session('_old_input.category') === null)>- No category -</option>

            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(session('_old_input.category') == $category->id)>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror
    
        <input type="submit" value="Make !"/>

    </form>

@endsection