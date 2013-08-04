@extends('site.user.modal')

@section('title')
Delete Post -
@parent
@stop


@section('page-content')
<h3>Hapus?</h3>
<p>Anda yakin ingin menghapus <strong> {{ $pin->title }} </strong> ? </p>
<p><img src="{{ asset($pin->source) }}" height="300" /></p>

{{ Form::open(array('url' => 'user/pin/'.$pin->id.'/delete.php', 'class' => 'form-horizontal')) }}

{{ Form::hidden('id', $pin->id) }}

{{ Form::submit('Hapus', array('class' => 'btn btn-danger')) }}
<a href="{{ URL::to('user/pin/index.php') }}" class="btn btn-link">Cancel</a>

{{ Form::close() }}
@stop
