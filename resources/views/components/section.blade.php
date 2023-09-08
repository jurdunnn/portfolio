@props([
    'bgColor' => 'bg-primary',
    'textColor' => 'text-secondary',
    'heading' => 'Section',
])

<section>
    <div class="outer">
        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one">
                <h2 class="section-heading text-{{ $textColor }}">{{ $heading }}</h2>
            </div>
        </div>
    </div>
</section>
