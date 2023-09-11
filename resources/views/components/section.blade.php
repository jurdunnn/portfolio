@props([
    'bgColor' => 'bg-primary',
    'textColor' => 'text-secondary',
    'heading' => 'Section',
    'slides' => [],
])

<section>
    <div class="outer">
        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one flex flex-col">
                <div class="slides-container">
                    <h2 class="slide section-heading text-{{ $textColor }}">{{ $heading }}</h2>
                    @foreach ($slides as $slide)
                        <div class="slide text-{{ $textColor }} {{ $slide['outer_classes'] ?? '' }}">
                            {!! $slide['inner_html'] !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
