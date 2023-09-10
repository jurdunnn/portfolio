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
                    <h2 class="slide section-heading text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide section-heading text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide section-heading text-{{ $textColor }}">Slide</h2>
                    <h2 class="slide section-heading text-{{ $textColor }}">Slide</h2>
                </div>
                <div class="controls">
                    <button id="prevButton">Prev</button>
                    <button id="nextButton">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>
