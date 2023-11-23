@props(['slide', 'bgColor', 'textColor'])

<div class="flex flex-col items-center justify-center w-full gap-y-8">
    <h1 class="w-2/3 text-2xl font-bold text-center md:w-1/2 md:text-3xl lg:text-4xl xl:w-1/3">{{ $slide->project->heading }}</h1>

    <p class="w-2/3 text-xl text-center normal-case md:w-1/2 xl:w-1/3">
        Thank you for taking an interest in {{ $slide->project->heading }}! Feel free to have a look at the code or checkout the webiste.
        If you have any questions, please feel free to reach out to me on <a href="https://www.linkedin.com/in/jordan-downs-5a546a104/" class="underline no-slide" target="_blank">LinkedIn</a>.
    </p>

    <div class="flex flex-col lg:flex-row gap-y-3 no-slide mx-auto text-center mt-8 lg:mt-24 font-bold text-xs sm:text-sm lg:text-base  gap-x-12 w-full w-2/3 md:w-1/2 px-6 lg:px-12 text-{{ $textColor }}">
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
