
@extends('front.layouts.master')
@section('title',$category->name. '  Kategorisi ||'. count($articles). ' yazı bulundu')
@section('content')
        <div class="col-md-8 mx-auto">
            @if(count($articles)>0)
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="{{route('single.post',[$article->getCategory->slug,$article->slug])}}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                            <img src="{{$article->image}}" alt="">
                            <h3 class="post-subtitle">
                               {{$article->content}}
                            </h3>
                        </a>
                        <p class="post-meta">Kategori:
                            {{ $article->getCategory->name }}
                            <a href="#"></a>
                            <span class="float-right">{{$article->created_at->diffForHumans()}}</span></p>
                    </div>
                    <hr>
                @endforeach
            @else
              <div class="aler alert-danger">
                  <h1>Bu kategoriye ait yazı bulunamadı!</h1>
              </div>
            @endif

            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
        @include('front.widgets.category')
@endsection
