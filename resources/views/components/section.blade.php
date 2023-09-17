@props([
    'bgColor' => 'primary',
    'textColor' => 'secondary',
    'heading' => 'Section',
    'slides' => null,
])

<section>
    <div class="outer">
        <div class="inner">
            <div class="bg bg-{{ $bgColor }} one flex flex-col">
                <div class="slides-container">
                    <div class="slide">
                        <h2 class="section-heading text-center max-w-3xl xl:max-w-4xl mx-auto text-{{ $textColor }}">{{ $heading }}</h2>
                    </div>

                    @foreach($slides as $slide)
                        <div id="slide-{{ $loop->index }}" class="slide text-{{ $textColor }}">
                            @switch($slide->component[0]->value)
                                @case('text')
                                    <div class="flex flex-col justify-center w-2/4 px-8 pt-2 pb-6 mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                        @isset($slide->component_data['heading'])
                                            <h3 class="text-xl font-semibold">{{ $slide->component_data['heading'] }}</h3>
                                        @endisset

                                        @isset($slide->component_data['text'])
                                            <p class="text-left normal-case">{!! $slide->component_data['text'] !!}</p>
                                        @endisset
                                    </div>
                                @break

                                @case('text-with-image')
                                    <div class="flex justify-between w-3/4 max-h-[60vh] gap-x-8">
                                        @isset($slide->component_data['text'])
                                            <div class="flex flex-col justify-center w-2/3 px-8 pt-2 pb-6 mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                                @isset($slide->component_data['heading'])
                                                    <h3 class="text-xl font-semibold">{{ $slide->component_data['heading'] }}</h3>
                                                @endisset

                                                @isset($slide->component_data['text'])
                                                    <p class="text-left normal-case">{!! $slide->component_data['text'] !!}</p>
                                                @endisset
                                            </div>
                                        @endisset

                                        @isset($slide->component_data['image'])
                                            <div class="flex flex-col justify-center w-full mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                                <img
                                                    src="{{ $slide->component_data['image'] }}"
                                                    @isset($slide->component_data['image_alt'])
                                                        alt=""
                                                    @endisset
                                                    class="object-cover w-full h-full rounded-xl"
                                                >
                                            </div>
                                        @endisset
                                    </div>
                                @break

                                @case('problem-solution-value')
                                    <div class="flex flex-col w-3/4 gap-y-8 max-h-[60vh]">
                                        <div class="flex justify-between gap-x-8">
                                            @isset($slide->component_data['problem'])
                                                <div class="flex flex-col justify-center w-full px-8 pt-2 pb-6 mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                                    <h3 class="text-xl font-semibold">Problem</h3>

                                                    @isset($slide->component_data['problem'])
                                                        <p class="text-left normal-case">{!! $slide->component_data['problem'] !!}</p>
                                                    @endisset
                                                </div>
                                            @endisset

                                            @isset($slide->component_data['solution'])
                                                <div class="flex flex-col justify-center w-full px-8 pt-2 pb-6 mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                                    <h3 class="text-xl font-semibold">Solution</h3>

                                                    @isset($slide->component_data['solution'])
                                                        <p class="text-left normal-case">{!! $slide->component_data['solution'] !!}</p>
                                                    @endisset
                                                </div>
                                            @endisset
                                        </div>

                                        @isset($slide->component_data['value'])
                                            <div class="flex flex-col justify-center w-full px-8 pt-2 pb-6 mx-auto max-h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-xl bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
                                                <h3 class="text-xl font-semibold">Value</h3>

                                                @isset($slide->component_data['value'])
                                                    <p class="text-left normal-case">{!! $slide->component_data['value'] !!}</p>
                                                @endisset
                                            </div>
                                        @endisset
                                    </div>

                                @break

                                @default
                                    <div class="default-component">
                                        @isset($slide->component_data['text'])
                                            <p>{!! $slide->component_data['text'] !!}</p>
                                        @endisset
                                    </div>
                            @endswitch
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
