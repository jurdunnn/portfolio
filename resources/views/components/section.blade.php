@props([
    'bgColor' => 'primary',
    'textColor' => 'secondary',
    'heading' => 'Section',
    'slides' => null,
])

<section>
    <div class="outer relative">
        <x-notification />

        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one flex flex-col">
                <div class="relative slides-container">
                    <div class="slide">
                        <h2 class="section-heading text-center max-w-3xl xl:max-w-4xl mx-auto text-{{ $textColor }}">{{ $heading }}</h2>
                    </div>

                    @foreach($slides as $slide)
                        <div id="slide-{{ $loop->index }}" class="slide text-{{ $textColor }}">
                            @switch($slide->component[0]->value)
                                @case('text')
                                    <x-text :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @case('text-with-image')
                                    <x-text-with-image :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @case('image')
                                    <x-image :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @case('problem-solution-value')
                                    <x-problem-value-solution :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @case('links')
                                    <x-links :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @case('word-cloud')
                                    <x-word-cloud :slide="$slide" :textColor="$textColor" :bgColor="$bgColor" />
                                @break

                                @default
                                    <div class="default-component">
                                        @isset($slide->component_data['text'])
                                            <p>{!! $slide->component_data['text'] !!}</p>
                                        @endisset
                                    </div>
                            @endswitch
                        </div>

                        <x-slide-nav :slides="$slides" :heading="$heading" :textColor="$textColor" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
