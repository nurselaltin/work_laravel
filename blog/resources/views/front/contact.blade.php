
@extends('front.layouts.master')
@section('title','iletişim Sayfası')
@section('bg','https://www.cogitaproject.eu/wp-content/uploads/2020/06/https___blogs-images.forbes.com_alejandrocremades_files_2018_07_desk-3139127_1920-1200x773-1.jpg')
@section('content')
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{success}}
                                </div>
                            @endif
                            <form   method="post" action="{{route('contact.post')}}" >
                                @csrf
                                <div class="control-group">
                                    <div class="form-group">
                                        <label>Ad Soyad</label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Ad Soyad">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group col-xs-12">
                                        <label>Konu</label>
                                        <select class="form-control" name="topic">
                                            <option>Bilgi</option>
                                            <option>Destek</option>
                                            <option>Genel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" name="message" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
