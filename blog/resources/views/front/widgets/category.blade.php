<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Kategoriler
        </div>
    </div>
    <div class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{route('categories.post',$category->slug)}}">{{$category->name}} </a> <span class="badge bg-success float-right">{{$category->categoryCount()}}</span>
            </li>
        @endforeach
    </div>
</div>
