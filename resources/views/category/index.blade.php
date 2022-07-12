@extends('layouts.category')

@section('class','category-index')

@section('content')
    @forelse($categories as $category)
        <x-category.item :category="$category"/>
    @empty
        <h3>No category!</h3>
    @endforelse
@endsection