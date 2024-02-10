<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'FarmFuel Feeds') }}</title> --}}
        <title>FarmFuel Feeds</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- </head>style="background-image: url({{asset('assets/img/background-farm.jpg')}}); background-size: cover;" --}}
    <body class="font-sans text-gray-900 antialiased">
        <div class="  min-h-screen  flex flex-col sm:justify-center bg-gradient-to-r from-indigo-400 via-purple-500 to-blue-500 items-center pt-6 sm:pt-0 	" >

            <div class="mb-8   mt-6 px-6 py-4 text-white	bg-gradient-to-r from-purple-600 to-indigo-500 	sm:rounded-lg	 text-center">
                <h1 class="text-6xl font-extrabold mb-4">FarmFuel Feeds</h1>
            </div>

            <div class="flex w-8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
                <div class="w-1/2" style="background-image: url({{asset('assets/img/1.jpg')}}); background-size: cover;">

                </div>
                <div class="w-1/2">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>

            </div>




        </div>


    </body>
</html>
