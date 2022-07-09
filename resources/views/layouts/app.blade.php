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
            <h1>Welcome to Todo Collection !</h1>
        </header>
        <nav>
            <ul>
                <li><h2>List</h2></li>
                <li><h2>Make</h2></li>
            </ul>    
        </nav>
    </div>

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