@props(['slide', 'bgColor', 'textColor'])

<div class="justify-center w-3/4 p-8 no-scroll mx-auto h-[60vh] overflow-scroll text-ellipsis text-normal xl:text-lg text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }}">
    <div class="flex flex-col gap-y-6">
        @isset($slide->component_data['heading'])
            <h3 class="font-semibold no-scroll text-normal">{{ $slide->component_data['heading'] }}</h3>
        @endisset

        @isset($slide->component_data['text'])
            <p class="text-lg text-left normal-case md:text-xl no-scroll">{!! $slide->component_data['text'] !!}</p>
        @endisset
    </div>
</div>
