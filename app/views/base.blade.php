<!doctype html>
<html>
<head>
    <title>Something</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stylesheets('fo-css')
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="navbar-inner navbar-fixed-top">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Sistem Informasi <br /><small>Universitas Lorem Ipsum</small></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="cover-area">
            <div class="cover-pic">
                <img src="/assets/img/cover.jpg" />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <hr />
            <p>Footer</p>
        </div>
    </div>
    @javascripts('fo-js')
</body>
</html>