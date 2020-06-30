
@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
        <div class="col-md-8 mx-auto">
            @foreach($articles as $article)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{ $article->title }}
                        </h2>
                        <h3 class="post-subtitle">
                           {{$article->content}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        {{$article->created_at}}</p>
                </div>
                <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
      @include('front.widgets.category')
@endsection
