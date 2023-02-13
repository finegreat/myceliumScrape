<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="background-color:#fbf8f0; padding-bottom:175px; padding-top:100px;">
    <header class="container fixed-top pt-4 ps-4 pe-4" style="background-color:#fbf8f0;">
        <div class="row pb-4 border-bottom">
            <div class="col-7 col-lg-4">
                <a href="/"><img src="/assets/images/motif.png" width="35" class="me-2" /><img src="/assets/images/mycelium-open-source-carbon-network-logo.png" width="144" /></a>
            </div>
            <div class="col-5 col-lg-8 text-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                        @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </header>
    <main class="container p-4">
        @isset ($header)
        <div class="row">
            {{ $header}}
        </div>
        @endisset
        <div class="row pb-4">
            <x-jet-banner />
        </div>
        {{ $slot }}
    </main>
        <footer class="container-fluid fixed-bottom p-4 bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3"><img src="/assets/images/mycelium-logo-white.svg"
                            width="204" /><br />&copy; Mycelium Network Ltd 2023</div>
                    <div class="col border-end border-2 border-white me-5">Talk to us: <a href="crew@mycelium-network.com"
                            class="text-white">crew@mycelium-network.coms</a></div>
                    <div class="col col-lg-2">
                        <ul>
                            <li><a href="/our-story" class="text-white">Our Story</a></li>
                            <li><a href="/research" class="text-white">Research</a></li>
                            <li><a href="/team" class="text-white">Team</a></li>
                        </ul>
                    </div>
                    <div class="col col-lg-2">
                        <ul>
                            <li><a href="/terms-and-conditions" class="text-white">Terms and conditions</a></li>
                            <li><a href="/privacy-policy" class="text-white">Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    </html>
