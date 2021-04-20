<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('logo.ico') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            header{
                width: 100%;
                position: fixed;
                background-color: white;
                z-index: 3;
            }

            .headernavi{
                width: 70%;
                margin: auto;
            }

            .main{
                width: 100%;
                position: absolute;
                z-index: 2;
                top: 70px;
            }

            .backcolor{
                position: absolute;
                position: fixed;
                width: 30%;
                height: 100%;
                background-color: #CBD5CF;
                z-index: 1;
                right: 0;
            }

        </style>

    </head>

    <body>
        <header>
            <div class="headernavi">
                @include('layouts.navigation')
            </div>
        </header>

        <div>
            <main class="main">
                {{ $slot }}
            </main>
            <div class="backcolor">
            </div>
        </div>
    </body>
</html>
