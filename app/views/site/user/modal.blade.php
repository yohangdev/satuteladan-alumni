@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-lg-2">
        <ul class="nav nav-pills nav-stacked">
            <li {{ (Request::is('user/dashboard') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/dashboard') }}}">Dashboard</a></li>
            <li {{ (Request::is('user/pin/*') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/pin/') }}}">Foto</a></li>
            {{-- <li {{ (Request::is('user/profile/edit') ? ' class="active"' : '') }}><a href="#">Profile</a></li> --}}
        </ul>
    </div>
    <div class="col-lg-10">
        {{ Notification::container('UserPageModal')->all()->first() }}
        @yield('page-content')
    </div>
</div>

@stop
