@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
Login -
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
        <p class="lead">Log In terlebih dahulu untuk bisa membuat post baru.</p>
	</div>
	<div class="col-lg-4">
	<h3>Log in</h3>
    @if ( Session::get('login-error') )
    <div class="alert alert-danger">{{ Session::get('login-error') }}</div>
    @endif

    <div class="panel-group" id="accordion">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
    			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
    				Facebook
    			</a>
                </h4>
    		</div>
    		<div id="collapseOne" class="panel-collapse collapse in">
    			<div class="panel-body">
					<a href="https://www.facebook.com/dialog/oauth?client_id=294330260608032&amp;scope=email,user_photos&amp;redirect_uri={{{ url('facebook/auth') }}}">
						<img src="{{ asset('assets/img/fb-login.png') }}" class="img-responsive" />
					</a>
    			</div>
    		</div>
    	</div>
    	<div class="panel">
    		<div class="panel-heading">
                <h4 class="panel-title">
    			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
    				Email &amp; Password
    			</a>
                </h4>
    		</div>
    		<div id="collapseTwo" class="panel-collapse collapse">
    			<div class="panel-body">
					<form method="POST" action="{{ URL::to('login') }}">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <fieldset>
					    	<div class="form-group">
					    		<input type="text" class="form-control" name="email" placeholder="Alamat Email" value="{{ Input::old('email') }}">
					    	</div>
					    	<div class="form-group">
					    		<input type="password" class="form-control" name="password" placeholder="Password">
					    	</div>
					    	<div class="checkbox">
					    		<label>
					    			<input name="remember" type="checkbox"> Ingat saya
					    		</label>
					    	</div>

					        <button tabindex="3" type="submit" class="btn btn-primary">Login</button>
					    </fieldset>
					</form>
    			</div>
    		</div>
    	</div>
    </div>

	</div>
</div>

@stop
