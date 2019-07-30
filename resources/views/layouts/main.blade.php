<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="icon" href="/images/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/malsup/cycle2/master/build/jquery.cycle2.min.js"></script>
    <script src="https://kit.fontawesome.com/01abc77b8c.js"></script>
</head>
<body>

<header class="header">
    <div class="topBar py-2">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-2 text-white">
                <p>Ph: 07 3488 8190</p>
                <ul class="text-right">
                    <li><a href="#">Submit Property</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
            </div><!-- end flex -->
        </div><!-- end container -->
    </div><!-- end topbar -->

    <nav class="main">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-4">
                <a href="/">
                    <img src="/images/logo@2x.png" class="object-scale-down" style="width: 50%;">
                </a>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Properties</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">EOI Form</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Video</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- end main -->
</header><!-- end header -->

<div class="content">
    @yield('content')
</div>

<div class="footer">
    <div class="container mx-auto py-10" style="text-align: center;">
        <img src="/images/DP-icon-300x119.png" style="width: 50px;display: inline-block;">
        <p>&copy; 2019 Daynes Property.</p>
    </div>
</div>
</body>
</html>