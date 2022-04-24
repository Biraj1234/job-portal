<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        a {

            text-decoration: none;
            cursor: pointer;

        }

        .dropdown {
            margin-right: 4rem
        }

    </style>
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">EKbana</a>


                <div class="dropdown">
                    <a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text text-light">{{ Auth::user()->name }}</span>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>




            </div>
    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
