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
                                         <a category-id="{{$category->id}}" class="btn btn-sm btn-primary text-white edit-click" title="Kategori Düzenle"><i class="fa fa-edit"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kategori Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('admin.category.update')}}" method="post">
             @csrf
                <div class="form-group">
                    <label>Kategori Adı</label>
                    <input id="category" type="text"class="form-control" name="name">
                    <input type="hidden" id="category_id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>      
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
          //id ye ait data var mı kontrol et,varsa verileri console da göster

          $('.edit-click').click(function(){
             id = $(this)[0].getAttribute('category-id');
            $.ajax({
                type:'GET',
                url:"{{route('admin.category.getdata')}}",
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#category').val(data.name);
                    $('#category_id').val(data.id);
                    $('#editModal').modal();
                }
            });

          })
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