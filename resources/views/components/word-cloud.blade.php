@props(['slide', 'textColor', 'bgColor'])

<style>
</style>

<div class="text-center">
    <ul class="flex flex-wrap justify-center max-w-xl cloud align-center gap-2 leading-8">
        @foreach(explode(',', $slide->component_data['words']) as $word)
            <li>
                <a href="https://google.co.uk/search?q=laravel {{ trim($word) }}" target="_blank" class="hover:scale-110 hover:font-bold ease-in-out duration-150" data-weight="{{ $loop->index }}">{{ trim($word) }}</a>
            </li>
        @endforeach
    </ul>
</div>

<script>
    const tags = document.querySelectorAll('ul.cloud a');

    tags.forEach((tag, index) => {
        const size = Math.floor(Math.random() * 41) + 10;

        const hue = Math.floor(Math.random() * 360);

        const saturation = Math.floor(Math.random() * 101);

        const lightness = Math.floor(Math.random() * 51) + 50;

        tag.style.fontSize = `${size}px`;

        tag.style.color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
    });
</script>
