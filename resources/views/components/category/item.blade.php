@props([
    'category'=>null
])

<a href="{{route('categories.edit',['category'=>$todo])}}" target="_blank">
    <div class="category-item">
        <strong>{{$category->title}}</strong>
    </div>
</a>