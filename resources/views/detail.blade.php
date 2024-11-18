<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/card.css') }}">

        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/sass/styl.scss',
        ])

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
       <main class="detail">
        <div class="card">
            <h2> {{ $poke->nazev }} </h2>
            <img
                src="{{ asset('images/' . $poke->id . '.jpg') }}"
                alt="{{ $poke->nazev }}"
            >
            <p>{{ $poke->popis }}</p>
            <a href="{{ route('index') }}">
                <i class="fa-solid fa-left-long"></i>
            </a>
        </div>
       </main>
    </body>
</html>
