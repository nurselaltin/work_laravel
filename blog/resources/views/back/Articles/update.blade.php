@extends('back.layouts.master')
@section('title','Makale Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('admin.makaleler.update',$article->id)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Makale Başlığı</label>
                    <input type="text" name="title" class="form-control"  value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label>Makale Kategori</label>
                    <select name="category" class="form-control">
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category )
                            <option  @if($article->category_id == $category->id)selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                     <label>Makale Fotoğrafı</label></br>
                     <img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="200">
                 </br>
                     <input type="file" name="image" class="form-control">
                 </div>
                <div class="form-group">
                     <label>Makale İçeriği</label>
                    <textarea name="icerik"  id="editor" class="form-control"  rows="5">{{$article->content}}</textarea>
                 </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Makale Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#editor').summernote(
                {
                    'height':300
                }
            );
        });
    </script>

@endsection
