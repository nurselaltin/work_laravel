@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span></span>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td><img src="{{$page->image}}" width="200"></td>
                            <td>{{$page->title}}</td>
                            <td>
                                <input class="switch" type="checkbox" @if($page->state == 1)  checked @endif  page-id="{{$page->id}}" data-toggle="toggle" data-on="Aktif" data-off="Pasif" data-style="slow" data-onstyle="success" data-offstyle="danger">
                            </td>
                            <td>
                                <a target="_blank" href="{{route('page',$page->slug)}}"  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.page.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.page.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
              id = $(this)[0].getAttribute('page-id');
              state = $(this).prop('checked');
              //get metoduylada id mizi articlescontroller>switch metoduna gönderiyoruz
              $.get('{{route('admin.page.switch')}}',{id:id, state:state},function (data,status) {
                  console.log(data);
              });


          });
      });
    </script>
@endsection
