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
            <div>Animated Sections</div>
            <div>Made By Brian</div>
        </header>
        <section class="first">
            <div class="outer">
                <div class="inner">
                    <div class="bg one">
                        <h2 class="section-heading">Scroll down</h2>
                    </div>
                </div>
            </div>

        </section>
        <section class="second">
            <div class="outer">
                <div class="inner">
                    <div class="bg">
                        <h2 class="section-heading">Animated with GSAP</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="third">
            <div class="outer">
                <div class="inner">
                    <div class="bg">
                        <h2 class="section-heading">GreenSock</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="fourth">
            <div class="outer">
                <div class="inner">
                    <div class="bg">
                        <h2 class="section-heading">Animation platform</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="fifth">
            <div class="outer">
                <div class="inner">
                    <div class="bg">
                        <h2 class="section-heading">Keep scrolling</h2>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
