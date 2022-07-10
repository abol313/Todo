@extends('layouts.category')

@section('content')
    <x-category.item :category="$category"/>
@endsection