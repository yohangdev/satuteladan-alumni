@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $pin->title }}} - 
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

@section('fb_image')
	{{ asset($pin->source) }}
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="pin-content-container">
		{{ $pin->content('image', array('type' => 'full_width')) }}
		</div>
    </div>
    <div class="col-lg-6">
    	<div class="pin-detail">
	    	<h3>{{{ $pin->title }}}</h3>
	    	<div class="pin-description">
				<div class="author">
					{{ $pin->author->profilePhoto(array('size' => 'thumb-48', 'class' => 'pic')) }}
					<span class="name"><a href="#">{{{ $pin->author->name }}}</a></span>
					<span class="date">{{{ $pin->date() }}}</span>
					<div class="clearfix"></div>
				</div>	    		
				<p class="desc" style="margin:20px 0">{{ $pin->description() }}</p>
				<div class="fb-like" data-width="450" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
			</div>

	    	<div class="fb-comments" data-href="{{{ $pin->url() }}}" data-colorscheme="light" data-width="570"></div>    
    	</div>	
    </div>
</div>

<script type="text/javascript">
var pin_container = $('.pin-content-container');

pin_container.imagesLoaded( function() {

	var pin_container_height = pin_container.height();

	pin_container.css('height', pin_container_height - 50);
	pin_container.css('overflow-y', 'hidden');
});
</script>

@stop
