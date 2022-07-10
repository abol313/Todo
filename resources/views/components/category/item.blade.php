@props([
    'category'=>null
])

<a href="{{route('categories.edit',['category'=>$category])}}" target="_blank">
    <div class="category-item">
        <strong>{{$category->name}}</strong>
    </div>
</a>