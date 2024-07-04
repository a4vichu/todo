<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @yield('styles')
</head>

<body>

    @include('partials.top_nav')
    <div class="w-full min-h-screen h-full flex items-center justify-center bg-blue-400 font-sans">
        {{-- Components --}}
        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
