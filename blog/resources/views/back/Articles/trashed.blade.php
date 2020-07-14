@extends('back.layouts.master')
@section('title','Silinen Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span>{{$articles->count()}} makale bulundu</span>
                <a href="{{route('admin.makaleler.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash">Tüm Makaleler</i></a>
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
                                <a href="{{route('admin.recover',$article->id)}}" title="Makaleyi Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                <a href="{{route('admin.hardDelete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection

