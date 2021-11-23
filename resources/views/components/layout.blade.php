<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Priki</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</head>
<body>
    <x-navbar></x-navbar>
    <main class="container mx-auto">
        {{ $slot }}
    </main>
</body>
</html>
