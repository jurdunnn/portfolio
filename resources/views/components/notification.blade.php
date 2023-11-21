<div class="notification px-2 absolute top-[100%] left-[50%] hidden -translate-x-[50%] py-4 flex align-middle justify-center w-2/3 bg-secondary text-primary shadow-xl rounded-md md:w-1/3">
    <span class="text-base normal-case js-notification-text">Left click to go to the next slide!</span>

    <button onclick="hideTutorial()" class="absolute w-5 h-5 top-1 right-1"><x-heroicon-s-x-mark class="w-5 h-5" /></button>
</div>

<script>
    function hideTutorial() {
        const notification = document.querySelector('.notification');

        notification.classList.add('hidden');

        sessionStorage.setItem('showTutorial', 'false');
    }
</script>
