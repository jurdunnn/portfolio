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
                    <div class="slide">
                        <h2 class="section-heading max-w-3xl mx-auto text-{{ $textColor }}">{{ $heading }}</h2>
                    </div>

                    @foreach($slides as $slide)
                        <div id="slide-{{ $loop->index }}" class="slide text-{{ $textColor }}">
                            @switch($slide->component[0]->value)
                                @case('text')
                                    <div class="text-component">
                                        <p>{{ $slide->component_data['text'] }}</p>
                                    </div>
                                @break

                                @case('text-with-image')
                                    <div class="text-with-image-component">
                                        <p>{{ $slide->component_data['text'] }}</p>
                                        <p>{{ $slide->component_data['image'] }}</p>
                                    </div>
                                @break

                                @default
                                    <div class="default-component">
                                        <p>{{ $slide->component_data['text'] }}</p>
                                    </div>
                            @endswitch
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
