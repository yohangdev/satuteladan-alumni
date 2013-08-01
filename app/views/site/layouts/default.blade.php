<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        @section('title')
        Portal Alumni SMA Negeri 1 Yogyakarta
        @show        
    </title>
    <meta name="keywords" content="your, awesome, keywords, here" />
    <meta name="author" content="Jon Doe" />
    <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ Basset::show('public.css') }}
    {{ Basset::show('public.js') }}
</head>
<body>
<div id="wrap">    
    <header class="header">
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand" href="#">Sistem Informasi</a>                           
                <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="area-cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">           
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
                <!-- include('notifications') -->
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
            <div class="col-lg-12">        
                <p>Information System</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>