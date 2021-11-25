<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Priki</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="{{ mix('js/app.js') }}"></script>
</head>
<body>
    @include('components.navbar')
    <main>
        <section class="section">
            <div class="container">
                <h1 class="title">{{ $titlePage }}</h1>
                {{ $slot }}
            </div>
        </section>
    </main>
</body>
</html>
