@extends('site.user.modal')

@section('title')
Dashboard -
@parent
@stop

@section('page-content')
<div class="jumbotron">
    <h3>Selamat Datang, {{{ Auth::user()->name }}} </h3>
    <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <p><a href="{{{ URL::to('user/pin/create.php') }}}" class="btn btn-primary btn-large">Create New Post</a>
    <a class="btn btn-primary btn-large">Edit Profile</a></p>
</div>  
@stop