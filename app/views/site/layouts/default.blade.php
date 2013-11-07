<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        @section('title')
        Satu Teladan - SMA Negeri 1 Yogyakarta
        @show
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <meta property="fb:app_id" content="294330260608032" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="
        @section('description')
            Mari berbagi di komunitas Satu Teladan
        @show
    " />
    <meta property="og:title" content="
        @section('title')
            Satu Teladan
        @show
        " />
    <meta property="og:image" content="
        @section('fb_image')
            https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/c28.28.345.345/s160x160/261309_432601843500639_262787513_n.jpg
        @show
    " />

    <meta name="keywords" content="your, awesome, keywords, here" />
    <meta name="author" content="Jon Doe" />
    <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ Basset::show('public.css') }}
    {{ Basset::show('public.js') }}
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=294330260608032";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="wrap">
    <header class="header">
        <div class="navbar navbar-static-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{{ URL::to('/') }}}" class="navbar-brand" href="#">Satu Teladan</a>
                <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
                        @if (Auth::check())
                        <li class="visible-sm"><a href="{{{ URL::to('user/dashboard') }}}">Dashboard</a></li>
                        <li class="visible-sm"><a href="{{{ URL::to('logout') }}}">Log Out</a></li>
                        @else
                        <li class="visible-sm"><a href="{{{ URL::to('login') }}}">Login</a></li>
                        <li class="visible-sm"><a href="{{{ URL::to('register') }}}">Register</a></li>
                        @endif
                    </ul>
                </div>
                @if (Auth::check())
                <div class="navbar-login-info navbar-form pull-right hidden-sm">
                    {{{ Auth::user()->name }}}
                    {{ Auth::user()->profilePhoto(array('size' => 'thumb-32')) }}
                </div>
                @endif
            </div>
        </div>
    </header>

    <section class="area-cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-left">
                        <h3>Galeri Foto</h3>
                    </div>
                    <div class="pull-right hidden-sm">
                        @if (Auth::check())
                        <a href="{{{ URL::to('user/pin/create') }}}" class="btn btn-success">Upload Foto</a>
                        <div class="btn-group">
                        <a href="{{{ URL::to('user/dashboard') }}}" class="btn btn-primary">My Account</a>
                        <a href="{{{ URL::to('logout') }}}" class="btn btn-danger">Log Out</a>
                        </div>
                        @else
                        <div class="btn-group">
                        <a href="{{{ URL::to('login') }}}" class="btn btn-primary">Log In</a>
                        <a href="{{{ URL::to('register') }}}" class="btn btn-success">Register</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Container -->
    <section class="area-main">
        <div class="container">
            <div class="area-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs">
                            @yield('breadcrumbs')
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                {{ Notification::container('SiteGlobal')->all() }}
                <!-- ./ notifications -->

                <!-- Content -->
                @yield('content')
                <!-- ./ content -->
            </div>
            <!-- ./ area-content -->
        </div>
        <!-- ./ container -->
    </section>
    <!-- ./ area-main -->

    <!-- the following div is needed to make a sticky footer -->
    <div id="push"></div>
</div>
<!-- ./wrap -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p style="letter-spacing: 0.1em; word-spacing: 0.1em;font-size: 8pt;">2013 &copy; TIM SATUTELADAN.NET</p>
                <p>Built with all the love in the world.</p>
                <br />
                <a href="https://twitter.com/satuteladan" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @satuteladan</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="col-lg-9">
                <div class="fb-like-box" data-href="https://www.facebook.com/satuteladan" data-width="292" data-colorscheme="dark" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36281860-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
