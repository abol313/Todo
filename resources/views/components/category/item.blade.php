@props([
    'category'=>null
])

<a href="{{route('categories.edit',['category'=>$category])}}">
    <div class="category-item">
        <strong>{{$category->name}}</strong>
    </div>
</a>