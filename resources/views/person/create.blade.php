@extends('layouts.master')
@section('title','Kişi Ekleme')
@section('content')
    <div class="section">
        <!--Basic Form-->
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <h4 class="header2">Kişi Ekle</h4>
                        <div class="row">
                            <form class="col s12" method="POST" action="{{route('person.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name">
                                        <label for="name">Ad Soyad</label>
                                        @error('name')
                                            <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="gender">
                                            <option value="" disabled selected>Seçiniz</option>
                                            <option value="1">Erkek</option>
                                            <option value="2">Kadın</option>
                                            <option value="3">Farketmez</option>
                                        </select>
                                        <label>Cinsiyet</label>
                                        @error('gender')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="birthday">Doğum Tarihi</label>
                                    <div class="input-field col s12">
                                        <input type="date" id="birthday" name="birthday">
                                        @error('birthday')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Kaydet
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


