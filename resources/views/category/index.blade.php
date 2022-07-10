@extends('layouts.category')

@section('content')
    @forelse($categories as $categories)
        <x-categories.item :categories="$categories"/>
    @empty
        <h3>No category!</h3>
    @endforelse
@endsection