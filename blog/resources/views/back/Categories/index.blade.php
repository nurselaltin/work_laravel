@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
  <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.category.create')}}">
                            @csrf
                             <div  class="form-gorup">
                                <label>Kategori Adı</label>
                                <input type="text" class="form-control" name="category_name" required>
                             </div>
                                </br>
                             <div  class="form-gorup">
                                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                             </div>
                        </form>
                    </div>
            </div> 
       </div>
       <div class="col-md-8">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Makale Sayısı</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->categoryCount()}}</td>
                                    <td>
                                        <input class="switch" type="checkbox" @if($category->state == 1)  checked @endif  category-id="{{$category->id}}" data-toggle="toggle" data-on="Aktif" data-off="Pasif" data-style="slow" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                     dd
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                   </div>
                </div>
                    </div>
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
              id = $(this)[0].getAttribute('category-id');
              state = $(this).prop('checked');
              //get metoduylada id mizi articlescontroller>switch metoduna gönderiyoruz
              $.get('{{route('admin.category.switch')}}',{id:id, state:state},function (data,status) {
                  console.log(data);
              });


          });
      });
    </script>
@endsection