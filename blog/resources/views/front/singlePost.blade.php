
@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
            <div class="col-lg-8 col-md-10 mx-auto">
               <p>{{$article->content}}</p>
                <br/><br/>
                <span class="text-danger">Okunma Sayısı : {{$article->view}}</span>
            </div>
      @include('front.widgets.category')
@endsection
