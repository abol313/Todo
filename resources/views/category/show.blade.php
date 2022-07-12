@extends('layouts.category')

@section('class','category-show')

@section('content')
    <x-category.item :category="$category"/>
@endsection