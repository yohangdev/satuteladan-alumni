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
			<?php for($n=0; $n<20; $n++): ?>
			<div class="item">
				<div class="content">
					<img src="holder.js/100%x300" />
				</div>
				<div class="description">
					<p class="desc">Fajar Pagi Yogyakarta</p>
					<div class="author">
						<img class="pic" src="holder.js/32x32" />
						<span class="name">Yoga Hanggara</span>
						<span class="date">1 Agustus 2013</span>
					</div>
				</div>
			</div>		
			<?php endfor; ?>																							
		</div>
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
