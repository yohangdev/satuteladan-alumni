@extends('site.user.modal')

@section('title')
Dashboard -
@parent
@stop

@section('page-content')
<div class="jumbotron">
    <h3>Selamat Datang, {{{ Auth::user()->name }}} </h3>
    <p><a href="{{{ URL::to('user/pin/create') }}}" class="btn btn-primary btn-large">Upload Foto</a>
    <a class="btn btn-primary btn-large">Edit Profile</a></p>
</div>
@stop