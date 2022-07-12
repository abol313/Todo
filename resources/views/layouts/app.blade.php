<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="Todo Collection"/>
    <meta property="og:description" content="Manage with your tasks more benefits..."/>
    <meta property="og:url" content="{{route('todos.index')}}"/>
    <meta property="og:image" content="images/site_banner.png"/>

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