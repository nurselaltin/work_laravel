@extends('back.layouts.master')
@section('title','Sayfa Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('admin.page.update',$page->id)}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Sayfa Başlığı</label>
                    <input type="text" name="title" class="form-control"  value="{{$page->title}}">
                </div>
                 <div class="form-group">
                     <label>Sayfa Fotoğrafı</label></br>
                     <img src="{{asset($page->image)}}" class="img-thumbnail rounded" width="200">
                 </br>
                     <input type="file" name="image" class="form-control">
                 </div>
                <div class="form-group">
                     <label>Sayfa İçeriği</label>
                    <textarea name="icerik"  id="editor" class="form-control"  rows="5">{{$page->content}}</textarea>
                 </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Sayfa Güncelle</button>
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
