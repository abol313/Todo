@extends('layouts.category')

@section('class','category-create')

@section('content')
    <h2>Make a Category !</h2>

    @if($msg = session()->pull('message'))
        <div class="msg msg-{{$msg['mode']}}">
            <h3>{{$msg['content']}}</h3>
        </div>
    @endif

    <form action="{!!route('categories.store')!!}" method="post">
        @csrf

        <label for="name">Category Name</label>
        <input id="name" name="name" value="{{old('name')}}" minlength="3" maxlength="14" placeholder="Give a name to this category" title="pass a name for your category" required/>
        @error('name')
            <div class="msg msg-warning msg-input">
                <h3>{{$message}}</h3>
            </div>
        @enderror

        <input type="submit" value="Make !"/>

    </form>
@endsection