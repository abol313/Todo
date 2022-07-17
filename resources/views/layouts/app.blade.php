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

    <!-- Chrome, Firefox OS and Opera -->
    <meta id="nav_color" name="theme-color" content="green">  
    <link rel="shortcut icon" href="images/site_logo.png"/>

    @php
        $appThemeBrightness = session('theme.brightness','dark');   
        $appThemeColor = session('theme.color','green');  
        $appThemeFile = $appThemeBrightness.'_'.$appThemeColor;  
    @endphp
    @vite('resources/css/colors.css')
    @vite('resources/css/dark.css')
    @vite("resources/css/$appThemeFile.css")
    @vite('resources/css/app.css')
    @stack('styles')
    
    @vite('resources/js/app.js')
    <title>@yield('title','Todo Collection')</title>
</head>
<body class="@yield('class','app')">
    <script>
        document.getElementById("nav_color").setAttribute('content',`rgb(${getComputedStyle(document.body).getPropertyValue('--color-bg')})`)
    </script>   

    <div class="header-nav">
        <header>
            @auth
                <h1>
                    Hi {{str(auth()->user()->name)->title()}},
                </h1>
            @endauth
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

                @section('authbar')
                    @guest
                        <li>
                            <a href="{{route('auth.login')}}">
                                <h2>Auth</h2>
                            </a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <a href="{{route('auth.logout')}}">
                                <h2>Log out</h2>
                            </a>
                        </li>
                    @endauth
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
        <form class="form-theme" action="{{route('theme')}}">
            @php
                $themeColors = ['cyan','green','grey','orange','pink','yellow'];
                $themeBrightnesses = ['light','dark'];
            @endphp
            <select name="brightness">
                @foreach($themeBrightnesses as $themeBrightness)
                    <option value="{{$themeBrightness}}" @selected(session('theme.brightness','dark')==$themeBrightness)>{{$themeBrightness}}</option>
                @endforeach
            </select>

            <select name="color">
                @foreach($themeColors as $themeColor)
                    <option value="{{$themeColor}}" @selected(session('theme.color','green')==$themeColor)>{{$themeColor}}</option>
                @endforeach
            </select>
            
            <input type="submit" value="Draw Theme"/>
        </form>
        <h1>Made in interests !<h1>
    </footer>
</body>
</html>