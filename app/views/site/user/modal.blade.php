@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-lg-2">
        <ul class="nav nav-pills nav-stacked">
            <li {{ (Request::is('user/dashboard.php') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/dashboard.php') }}}">Dashboard</a></li>
            <li {{ (Request::is('user/pin/*') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/pin/index.php') }}}">Post</a></li>
            <li {{ (Request::is('user/profile/edit.php') ? ' class="active"' : '') }}><a href="#">Profile</a></li>
        </ul>       
    </div>  
    <div class="col-lg-10">
        {{ Notification::container('UserPageModal')->all()->first() }}
        @yield('page-content')
    </div>
</div>

@stop
