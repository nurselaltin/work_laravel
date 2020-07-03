
@extends('front.layouts.master')
@section('title',$category->name. '  Kategorisi ||'. count($articles). ' yazı bulundu')
@section('content')
        <div class="col-md-8 mx-auto">
            @include('front.widgets.articlesList')
        </div>
        @include('front.widgets.category')
@endsection
