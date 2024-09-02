<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/output.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden overflow-y-auto">
    @livewireScripts
    <div id="app" class="min-h-screen flex flex-col">
        <div class="w-full">
            <div class="bg-white flex rounded-lg mx-4 shadow-md p-2">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">KasirKu!</h2>
                    {{-- <p class="text-gray-600">Sign in</p> --}}
                </div>
                <div class="flex-grow"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary hover:bg-orange-700 text-white justify-end font-bold py-2 px-4 rounded focus:outline-none focus-shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                          </svg>
                          
                        Sign Out
                    </button>
                </form>
            </div>
            <div class="flex">
                <div class="w-1/6">
                    @include('layouts.sidebar')
                </div>
                <main class="flex-grow">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
</html>