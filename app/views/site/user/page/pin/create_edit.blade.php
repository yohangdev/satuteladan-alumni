@extends('site.user.modal')

@section('title')
	@if (isset($pin))
	Edit
	@else
	Create New
	@endif
	Post -
@parent
@stop

@section('page-content')


@if (isset($pin))
{{ Form::model($pin, array('url' => 'user/pin/'.$pin->id.'/edit.php', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => 'user/pin/create.php', 'files' => true, 'class' => 'form-horizontal')) }}
@endif
<fieldset>
	<legend>
		@if (isset($pin))
		Edit
		@else
		Create New
		@endif
	</legend>

	@if (isset($pin))
	<div class="form-group">
		
		<div class="col-lg-offset-2 col-lg-3">
			{{ $pin->content('image', array('type' => 'thumbnail_home')) }}
		</div>
	</div>
	@endif

	@if (isset($pin))
	<div class="form-group {{ $errors->first('title', 'has-error') }}">
		{{ Form::label('title', 'Judul', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::label('title', $pin->title, array('class' => 'control-label')) }}
		</div>
	</div>
	<div class="form-group {{ $errors->first('title', 'has-error') }}">
		{{ Form::label('url', 'URL', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			<label class="control-label">
			<a href="{{{ URL::to('pin/'.$pin->slug) }}}">{{{ URL::to('pin/'.$pin->slug) }}}</a>
			</label>
		</div>
	</div>	
	@else	
	<div class="form-group {{ $errors->first('title', 'has-error') }}">
		{{ Form::label('title', 'Judul', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Judul')) }}
			<span class="help-block">Judul ini <strong>tidak bisa</strong> diubah di kemudian hari.</span>
			{{ $errors->first('title', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	@endif

	@if (! isset($pin))
	<div class="form-group {{ $errors->first('type', 'has-error') }}">
		{{ Form::label('type', 'Type', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-3">
			{{ Form::select('type', array('image' => 'Image'), null, array('class' => 'form-control')) }}
			{{ $errors->first('type', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group {{ $errors->first('image', 'has-error') }}">
		{{ Form::label('image', 'File', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::file('image', array('class' => 'form-control')) }}
			<span class="help-block">Gambar harus mempunyai lebar minimum 570 pixel, ukuran maksimum 2 MB, format JPG</span>
			{{ $errors->first('image', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	@endif

	<div class="form-group {{ $errors->first('description', 'has-error') }}">
		{{ Form::label('description', 'Deskripsi', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Deskripsi')) }}
			{{ $errors->first('description', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-8">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			<a href="{{ URL::to('user/pin/index.php') }}" class="btn btn-link">Cancel</a>
		</div>
	</div>
</fieldset>
{{ Form::close() }}
@stop