@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
Register -
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent

@stop

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-lg-8">
        <h1>Halo,</h1>
        <p class="lead">Mendaftar terlebih dahulu untuk bisa bergabung dalam komunitas.</p>		
	</div>
	<div class="col-lg-4">
	<h3>Register</h3>

	<a href="https://www.facebook.com/dialog/oauth?client_id=294330260608032&amp;scope=email,user_photos&amp;redirect_uri={{{ url('facebook/auth') }}}">
		<img src="{{ asset('assets/img/fb-login.png') }}" class="img-responsive" />
	</a>

	</div>
</div>
@stop
