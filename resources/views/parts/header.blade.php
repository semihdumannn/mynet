<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>
    <!-- Favicons-->
    <link rel="icon" href="{{asset('cms/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset('cms/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{asset('cms/images/favicon/mstile-144x144.png')}}">
    <!-- For Windows Phone -->

    <!-- CORE CSS-->
    <link href="{{asset('cms/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('cms/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">{{--    <link href="{{asset('cms/css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection">--}}
    <!-- Custome CSS-->
    <link href="{{asset('cms/css/custom/custom-style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    @yield('page_css')
</head>
<body @guest class="cyan"@endguest>
<div id="app">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
