@props(['slide', 'bgColor', 'textColor'])

<div class="flex flex-col w-3/4 gap-y-8 h-[60vh] justify-between">
    <div class="flex flex-col justify-between h-full lg:flex-row gap-8">
        @isset($slide->component_data['problem'])
        <div class="justify-center w-full p-2 lg:p-8 mx-auto h-full overflow-scroll text-normal text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }}">
            <div class="flex flex-col no-scroll gap-y-3 lg:gap-y-6">
                <h3 class="text-lg font-semibold no-scroll">Problem</h3>

                @isset($slide->component_data['problem'])
                <p class="text-lg text-left normal-case md:text-xl no-scroll lg:text-normal">{!! $slide->component_data['problem'] !!}</p>
            @endisset
            </div>
        </div>
    @endisset

    @isset($slide->component_data['solution'])
    <div class="justify-center w-full p-2 lg:p-8 mx-auto h-full overflow-scroll text-normal text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }}">
        <div class="flex flex-col gap-y-3 no-scroll lg:gap-y-6">
            <h3 class="text-lg font-semibold no-scroll">Solution</h3>

            @isset($slide->component_data['solution'])
            <p class="text-lg text-left normal-case md:text-xl no-scroll lg:text-normal">{!! $slide->component_data['solution'] !!}</p>
        @endisset
        </div>
    </div>
@endisset
    </div>

    @isset($slide->component_data['value'])
    <div class="justify-center hidden lg:block w-full px-8 pt-4 pb-2 mx-auto h-full overflow-scroll text-normal text-center border-0 shadow-xl rounded-md bg-{{ $textColor }} text-{{ $bgColor }}">
        <div class="flex flex-col no-scroll gap-y-3">
            <h3 class="text-lg font-semibold no-scroll">Value</h3>

            @isset($slide->component_data['value'])
            <p class="text-lg text-left normal-case md:text-xl no-scroll">{!! $slide->component_data['value'] !!}</p>
        @endisset
        </div>
    </div>
@endisset
</div>
