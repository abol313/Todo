<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css"/>

    <title>@yield('title','Todo Collection')</title>
</head>
<body>
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
    
    <main>
        @section('content')
            <h3>Welcome ;)}</h3>
        @show
    </main>

    <footer>
        <h1>Made in Iran with interests !<h1>
    </footer>
</body>
</html>