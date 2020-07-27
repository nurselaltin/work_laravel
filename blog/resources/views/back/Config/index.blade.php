@extends('back.layouts.master')
@section('title','Site Ayarları')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span></span>
            </h6>
        </div>
    <div class="card-body">
        <form action="{{route('admin.config.save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label>Site Başlığı</label>
                        <input type="text" name="title" class="form-control"  value="{{$setting->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Aktiflik Durumu</label>
                        <select name="active" class="form-control" name="" id="">
                            <option  @if($setting->active == 1) selected @endif value="1">Açık</option>
                            <option @if($setting->active == 0) selected @endif value="0">Kapalı</option>
                        </select>
                    </div>
                </div>
            </div>
           <br/>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo</label>
                        <input name="logo" type="file" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label>Github</label>
                        <input type="text" name="github" class="form-control"  value="{{$setting->github}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-gorup">
                        <label>Facebook</label>
                        <input type="text" class="form-control"  name="facebook" value="{{$setting->facebook}}">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-block btn-md btn-success">Kaydet</button>
                  </div>
            </div>
        </form>
    </div>
     
    </div>
@endsection


