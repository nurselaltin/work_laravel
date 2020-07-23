@extends('back.layouts.master')
@section('title','Sayfa Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('admin.page.post')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Sayfa Başlığı</label>
                    <input type="text" name="title" class="form-control" required></input>
                </div>
                 <div class="form-group">
                     <label>Sayfa Fotoğrafı</label>
                     <input type="file" name="image" class="form-control" required>
                 </div>
                <div class="form-group">
                     <label>Sayfa İçeriği</label>
                    <textarea name="icerik"  id="editor" class="form-control"  rows="5"></textarea>
                 </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Sayfa Oluştur</button>
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
