@props(['slide', 'bgColor', 'textColor'])

<div class="flex flex-col items-center justify-center w-full gap-y-8">
    <h1 class="w-1/2 text-4xl font-bold text-center md:w-1/3">{{ $slide->project->heading }}</h1>

    <p class="w-1/2 text-xl text-center normal-case md:w-1/4">
        Feel free to have a look at the code or checkout the webiste. If you have any questions, please feel free to
        reach out to me on Twitter or LinkedIn.
    </p>

    <div class="flex no-slide mx-auto text-center mt-8 font-bold text-xs sm:text-sm lg:text-base  gap-x-12 w-full sm:w-2/3 md:w-1/2 px-12 text-{{ $textColor }}">
        <a
            @isset($slide->component_data['github'])
                href="{{ $slide->component_data['github'] }}"
            @else
                href="#"
            @endisset
            target="_blank"
            class="px-3 py-4 w-full border-1 flex items-center justify-center bg-{{ $textColor }} text-{{ $bgColor }} rounded-lg cursor-pointer ease-in-out duration-300 hover:scale-110"
        >
            <x-heroicon-s-code-bracket class="w-5 h-5 no-slide" />
            <span class="ml-2 no-slide">Take a look at the code</span>
        </a>

        <a
            @isset($slide->component_data['website'])
                href="{{ $slide->component_data['website'] }}"
            @else
                href="#"
            @endisset
            target="_blank"
            class="px-3 py-4 justify-center w-full border border-{{ $bgColor }} hover:bg-{{ $bgColor }} hover:text-{{ $textColor }} rounded-lg cursor-pointer ease-in-out duration-300 hover:scale-110 flex items-center"
        >
            <span class="mr-2 no-slide">Checkout the website</span>
            <x-heroicon-s-arrow-long-right class="w-5 h-5 no-slide" />
        </a>
    </div>
</div>
