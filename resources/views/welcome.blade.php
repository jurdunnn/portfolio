<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jordan Downs</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body class="antialiased scroll-smooth">
        <header>
            <div>Jordan Downs</div>
            <div>Full Stack Developer</div>
        </header>
        <section class="first">
            <div class="outer">
                <div class="inner">
                    <div class="bg bg-primary one">
                        <h2 class="section-heading text-secondary">Conte's Domestic Electrical Services</h2>
                    </div>
                </div>
            </div>

        </section>
        <section class="second">
            <div class="outer">
                <div class="inner">
                    <div class="bg bg-secondary">
                        <h2 class="section-heading text-primary">Steam Game Checker</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="third">
            <div class="outer">
                <div class="inner">
                    <div class="bg bg-primary">
                        <h2 class="section-heading text-secondary">Project Drawer</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="fourth">
            <div class="outer">
                <div class="inner">
                    <div class="bg bg-secondary">
                        <h2 class="section-heading text-primary">Cookery</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="fifth">
            <div class="outer">
                <div class="inner">
                    <div class="bg bg-primary">
                        <h2 class="section-heading text-secondary">Linux Games</h2>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
