<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('metas')
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Archivo+Narrow:400,400i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <title>@yield('title') - WebcamFinder</title>
</head>

<body>
    <header>
        <a href="{{ url('/') }}">
            <h2 class="site-name">WebcamFinder</h2>
        </a>

        <div class="container-buttons">
            @auth
                <button class="favorites" onclick="window.location.href = '{{ url('/favorites') }}';">Favorites</button>
                <button onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="log-out">Log Out</button>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            @endauth
            @guest
                <button onclick="window.location.href = '{{ url('/login') }}';" class="log-in">Log In</button>
                <button onclick="window.location.href = '{{ url('/register') }}';" class="register">Register</button>
            @endguest
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Developed by Julien Faussillon & Tibère Debizet</p>
    </footer>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>