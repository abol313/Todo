@extends('layouts.category')

@section('content')
    <h2>Edit the category !</h2>

    <form action="{!!route('categories.update',['category'=>$category])!!}" method="post">
        @csrf
        @method('put')

        <label for="name">Name</label>
        <input id="name" name="name" value="{{old('name')}}" minlength="3" maxlength="14" placeholder="name" title="pass a name for your category" required/>
        @error('name')
            <div class="error-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Edit !"/>

    </form>
    
    <h2>Delete the category !</h2>

    <form action="{!!route('categories.destroy',['categories'=>$categories])!!}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete !"/>
    </form>
@endsection