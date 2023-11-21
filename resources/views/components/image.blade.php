@props(['slide', 'bgColor', 'textColor'])

<div class="flex justify-between w-3/4 max-h-[60vh] gap-x-8">
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
