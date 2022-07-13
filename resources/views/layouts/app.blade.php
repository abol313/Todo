<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Todo Collection">
    <meta property="og:description" content="Manage with your tasks more benefits...">
    <meta property="og:image" content="{{url('images/site_banner.jpg')}}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{url('/')}}">
    <meta property="twitter:url" content="{{url('/')}}">
    <meta name="twitter:title" content="Todo Collection">
    <meta name="twitter:description" content="Manage with your tasks more benefits...">
    <meta name="twitter:image" content="{{url('images/site_banner.jpg')}}">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->

    <link rel="shortcut icon" href="images/site_logo.png"/>

    @vite('resources/css/colors.css')
    @vite('resources/css/dark.css')
    @vite('resources/css/app.css')
    @stack('styles')
    
    @vite('resources/js/app.js')
    <title>@yield('title','Todo Collection')</title>
</head>
<body class="@yield('class','app')">
    <div class="header-nav">
        <header>
            @section('header')
                <h1>Welcome !</h1>
            @show
        </header>
        <nav>
            <ul>
                @section('navbar')
                    <li>
                        <h2>item</h2>
                    </li>
                @show
            </ul>    
        </nav>
    </div>

    <aside>
        @section('sidebar')
            <h2>Why here ?</h2>
        @show
    </aside>
    
    <main class="custom-scroll">
        @section('content')
            <h3>Welcome ;)}</h3>
        @show
    </main>

    <footer>
        <h1>Made in interests !<h1>
    </footer>
</body>
</html>