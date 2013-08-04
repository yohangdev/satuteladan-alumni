@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')

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
    <div class="col-lg-12">
		<div id="masonry">
			<?php // for($n=0; $n<20; $n++): ?>
			@foreach ($pins as $pin)
			<div class="item">
				<div class="content">
					<a href="{{{ $pin->url() }}}">
					{{ $pin->content('image', array('type' => 'thumbnail_home')) }}
					</a>
				</div>
				<div class="description">
					<p class="desc"><a href="{{{ $pin->url() }}}">{{{ $pin->title }}}</a></p>
					<div class="author">
						{{ $pin->author->profilePhoto(array('size' => 'thumb-32', 'class' => 'pic')) }}
						<span class="name"><a href="#">{{{ $pin->author->name }}}</a></span>
						<span class="date">{{{ $pin->date() }}}</span>
					</div>
				</div>
			</div>		
			@endforeach	
			<?php // endfor; ?>																							
		</div>
		{{ $pins->links() }}
    </div>
</div>

<script type="text/javascript">
$('#masonry').imagesLoaded( function(){
  $('#masonry').masonry({
   itemSelector: '.item',
   isFitWidth: true,
   gutter: 20
  });
});
</script>

@stop
