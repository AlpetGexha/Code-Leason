<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <a href="/telescope" target="blank" class="mr-4 text-sm text-gray-700 dark:text-gray-500 underline">Telescope</a>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container mx-auto">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            {{-- Check for  --}}

            <form class="my-2" action="{{ route('welcome') }}" method="POST">
                @csrf
                <x-primary-button class="ml-4" >
                    {{ __('Welcome Email') }}
                </x-primary-button>
            </form>

            <form class="my-2" action="{{ route('workflow') }}" method="POST">
                @csrf
                <x-primary-button class="ml-4" >
                    {{ __('Workflow Chain') }}
                </x-primary-button>
            </form>

            <form class="my-2" action="{{ route('workflow2') }}" method="POST">
                @csrf
                <x-primary-button class="ml-4" >
                    {{ __('Sorkflow Batch') }}
                </x-primary-button>
            </form>

            <form class="my-2" action="{{ route('ratelimit') }}" method="POST">
                @csrf
                <x-primary-button class="ml-4" >
                    {{ __('Rate Limit') }}
                </x-primary-button>
            </form>

            <form class="my-2" action="{{ route('pipeline') }}" method="GET">
                <x-primary-button class="ml-4" >
                    {{ __('Pipeline') }}
                </x-primary-button>
            </form>

            <form class="my-2" action="{{ route('invoice') }}" method="GET">
                <x-primary-button class="ml-4" >
                    {{ __('invoice') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</body>

</html>
