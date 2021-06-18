@extends('layouts.master')
@section('title','Dashboard')
@section('content')
    <p>
        Hoş Geldiniz,<strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>
    </p>

@endsection


