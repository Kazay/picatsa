<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Picatsa</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700|Nunito:300,400,600">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="{{ route('home')}}">Picatsa</a></h1>
            <button id="burger" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <nav>
                <ul class="menu">
                @guest
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                    <li><a href="{{ route('thumbnail.index') }}">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <script src=""></script>
    <script src=""></script>
</body>
</html>
