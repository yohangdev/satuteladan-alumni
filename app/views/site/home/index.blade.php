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
    <div class="col-lg-8">
        <div style="background-color: #FFF; height: 400px">

        </div>
    </div>
    <div class="col-lg-4">
        <div style="background-color: #FFF; height: 400px">

        </div>
    </div>
</div>

@stop
