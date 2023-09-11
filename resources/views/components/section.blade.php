@props([
    'bgColor' => 'bg-primary',
    'textColor' => 'text-secondary',
    'heading' => 'Section',
])

<section>
    <div class="outer">
        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one flex flex-col">
                <div class="slides-container">
                    <h2 class="slide section-heading text-{{ $textColor }}">{{ $heading }}</h2>
                    <div class="slide">
                        <p>asdfshfds</p>
                        <p>adfjsfdj</p>
                        <p>sadjfssdfj</p>
                    </div>
                    <h2 class="slide text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide text-{{ $textColor }}">Slide</h2>
                </div>
            </div>
        </div>
    </div>
</section>
