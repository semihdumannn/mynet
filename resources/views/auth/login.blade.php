@extends('layouts.master')
@section('title','Giriş Ekranı')
@section('page_css')
    <link href="{{asset('cms/css/layouts/page-center.css')}}" type="text/css" rel="stylesheet"
          media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('cms/js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('cms/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="{{asset('cms/js/plugins/sweetalert/dist/sweetalert.css')}}" type="text/css" rel="stylesheet"
          media="screen,projection">

@endsection

@section('content')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{asset('cms/images/login-logo.png')}}" alt=""
                             class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Giriş Ekranı</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-content-mail prefix"></i>
                        <input id="email" type="text" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" class="center-align">E-mail</label>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="password" required autocomplete="current-password">
                        <label for="password">Şifre</label>
                        @error('password')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" id="remember-me" name="remember"/>
                        <label for="remember-me">Beni Hatırla</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">
                            Giriş
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
