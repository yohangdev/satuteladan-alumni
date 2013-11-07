@extends('site.user.modal')

@section('title')
Manage Post -
@parent
@stop

@section('page-content')
<div>
	<div class="pull-left">
	<h3 style="margin-top: 0">Manage Post</h3>
	</div>
	<div class="pull-left" style="margin-left: 10px">
	<a href="{{{ URL::to('user/pin/create') }}}" class="btn btn-primary">Upload Baru</a>
	</div>
	<div class="clearfix"></div>
</div>
@if(count($pins) > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>Judul</th>
			<th width="60px">Tipe</th>
			<th width="60px">Tampil</th>
			<th width="60px">Moderasi</th>
			<th width="200px">Tanggal</th>
			<th width="150px">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pins as $pin)
		<tr>
			<td>{{{ $pin->title }}}<br /><small><a href="{{{ URL::to('pin/'.$pin->slug) }}}">{{{ URL::to('pin/'.$pin->slug) }}}</a></small></td>
			<td>{{{ $pin->type }}}</td>
			<td align="center">{{ ( $pin->published == 1 ? '<span class="label label-success">Ya</span>' : '<span class="label label-danger">Tidak</span>' ) }}</td>
			<td><span class="label label-success">Diterima</span></td>
			<td>{{{ $pin->date() }}}</td>
			<td>
				<div class="btn-group">
			  		<a href="{{{ URL::to('user/pin/'.$pin->id.'/edit') }}}" class="btn btn-default btn-mini">Edit</a>
			  		<a href="{{{ URL::to('user/pin/'.$pin->id.'/delete') }}}" class="btn btn-danger btn-mini">Hapus</a>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-info">
    <strong>Tidak ada data</strong> Anda belum mempunyai posting. Silahkan buat baru.
</div>
@endif

{{ $pins->links() }}
@stop