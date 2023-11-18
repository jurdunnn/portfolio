@props([
    'textColor' => 'secondary',
    'heading' => 'Section',
    'slides' => null,
])

<div id="slide-nav" x-data="{ showInfo: false, info: '' }" class="invisible h-[50px] z-10 ease-in-out duration-300 absolute bottom-0 left-1/2">
    <div class="relative flex justify-center -translate-x-1/2 gap-x-6">
        <div x-show="showInfo" class="absolute -top-8 left-1/2 -translate-x-1/2 text-{{ $textColor }} text-xs w-full py-1 font-bold text-center align-middle px-2">
            <p x-text="info" class="m-auto letter-wide"></p>
        </div>

        <a id="slide-dot"
           x-on:mouseover="info = 'Project Heading'; showInfo = true"
           x-on:mouseleave="showInfo = false"
           data-slide="0"
           class="w-6 h-6 md:w-4 md:h-4 rounded-full bg-{{ $textColor }} ease-in-out duration-200 hover:scale-110 cursor-pointer"
           ></a>

        @foreach ($slides as $slide)
            <a id="slide-dot"
               @isset($slide->component_data['dot-heading'])
               x-on:mouseover="info = '{{ $slide->component_data['dot-heading'] }}'; showInfo = true"
               x-on:mouseleave="showInfo = false"
           @endisset
           data-slide="{{ $loop->index + 1 }}"
           class="w-6 h-6 md:w-4 md:h-4 rounded-full bg-{{ $textColor }} ease-in-out duration-200 hover:scale-110 cursor-pointer"
           ></a>
       @endforeach
    </div>
</div>
