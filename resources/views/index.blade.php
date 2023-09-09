<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jordan Downs</title>

        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body class="antialiased scroll-smooth">
        <header>
            <p>Jordan Downs</p>
            <p>Full Stack Developer</p>
        </header>

        @foreach ($projects as $project)
            <x-section
                bgColor="{{ $loop->odd ? 'primary' : 'secondary' }}"
                textColor="{{ $loop->odd ? 'secondary' : 'primary' }}"
                heading="{{ $project['heading'] }}"
            />
        @endforeach
    </body>
</html>
