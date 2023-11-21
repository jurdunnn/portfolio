@props(['slide', 'bgColor', 'textColor'])

<div class="flex flex-col lg:flex-row flex-col-reverse justify-between w-3/4 max-h-[80vh] lg:max-h-[60vh] gap-8">
    @isset($slide->component_data['text'])
    <div class="justify-center w-full no-scroll lg:w-2/3 p-2 lg:p-8 mx-auto h-[90vh] md:h-[60vh] overflow-scroll text-ellipsis text-sm md:text-base lg:text-lg text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }}">
        <div class="flex flex-col no-scroll gap-y-2 lg:gap-y-6">
            @isset($slide->component_data['heading'])
            <h3 class="font-semibold no-scroll text-normal lg:text-lg">{{ $slide->component_data['heading'] }}</h3>
        @endisset

        @isset($slide->component_data['text'])
        <p class="text-lg text-left normal-case md:text-xl no-scroll">{!! $slide->component_data['text'] !!}</p>
    @endisset
        </div>
    </div>
@endisset

@isset($slide->component_data['image'])
<div class="flex flex-col justify-center w-full mx-auto h-[60vh] overflow-hidden text-lg text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }} gap-y-6">
    <img
        src="{{ Storage::url($slide->component_data['image']) }}"
        @isset($slide->component_data['image_alt'])
        alt="{{ $slide->component_data['image_alt'] }}"
    @endisset
    class="object-cover w-full h-full rounded-md"
    >
</div>
                                        @endisset
</div>
