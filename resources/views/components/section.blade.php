@props([
    'bgColor' => 'bg-primary',
    'textColor' => 'text-secondary',
    'heading' => 'Section',
    'slides' => null,
])

<section>
    <div class="outer">
        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one flex flex-col">
                <div class="slides-container">
                    <h2 class="slide section-heading text-{{ $textColor }}">{{ $heading }}</h2>
                    @foreach ($slides as $slide)
                        <div class="slide text-{{ $textColor }}">
                            <x-dynamic-component :component="$slide->component[0]->value" :data="$slide->component_data" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
