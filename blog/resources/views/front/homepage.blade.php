
@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
        <div class="col-md-8 mx-auto">
             @include('front.widgets.articlesList')
        </div>
      @include('front.widgets.category')
@endsection
