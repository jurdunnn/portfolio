<div class="notification px-2 absolute top-[100%] left-[50%] hidden -translate-x-[50%] py-4 flex align-middle justify-center bg-secondary text-primary shadow-xl rounded-md">
    <span class="pr-2 my-auto text-lg font-bold text-center normal-case js-notification-text">Left click to go to the next slide!</span>
    <button onclick="hideTutorial()" class="absolute w-6 h-6 top-1 right-1"><x-heroicon-s-x-mark class="w-6 h-6" /></button>
</div>

<style>
.notification {
    animation: fadeIn 0.5s ease-in-out;
    width: 60%;
    height: 100px;
    font-family: Arial, sans-serif;
    font-weight: bold;
    border: 2px solid #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

@media (max-width: 600px) {
    .notification {
        width: 90%;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
