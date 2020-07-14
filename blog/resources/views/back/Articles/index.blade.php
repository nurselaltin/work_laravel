@extends('back.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span>{{$articles->count()}} makale bulundu</span>
                <a href="{{route('admin.trashed.articles')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash">Silinen Makaleler</i></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Tarih</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><img src="public/{{$article->image}}" width="200"></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->view}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <input class="switch" type="checkbox" @if($article->state == 1)  checked @endif  article-id="{{$article->id}}" data-toggle="toggle" data-on="Aktif" data-off="Pasif" data-style="slow" data-onstyle="success" data-offstyle="danger">
                            </td>
                            <td>
                                <a target="_blank" href="{{route('single.post',[$article->getCategory->name,$article->slug])}}"  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      $(function () {
          $('.switch').change(function () {
              //sınıf olarak adlandırdığımız için array oluşturuyor , o yüzden 0. indexteki arrayden id yi alıyoruz.
              id = $(this)[0].getAttribute('article-id');
              state = $(this).prop('checked');
              //get metoduylada id mizi articlescontroller>switch metoduna gönderiyoruz
              $.get('{{route('admin.switch')}}',{id:id, state:state},function (data,status) {
                  console.log(data);
              });


          });
      });
    </script>
@endsection
