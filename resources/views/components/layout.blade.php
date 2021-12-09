<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="has-navbar-fixed-top"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $titlePage ?? '' }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <script defer src="{{ mix('js/app.js') }}"></script>
    @stack('custom-scripts')
</head>
<body class="is-family-code">
    <x-navbar/>
    <main>
        <section class="section">
            <div class="container">
                <h1 class="title">{{ $titlePage ?? '' }}</h1>
                {{ $slot }}
            </div>
        </section>
    </main>

    @livewireScripts
</body>
</html>
