@extends('layouts.category')

@section('content')
    @forelse($categories as $category)
        <x-category.item :category="$category"/>
    @empty
        <h3>No category!</h3>
    @endforelse
@endsection