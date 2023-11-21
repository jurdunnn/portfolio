let tutorials = [];

const notification = document.querySelector('.notification');
const notificationText = notification.querySelector('.js-notification-text');
const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

if (isMobile) {
    tutorials = [
        'Touch to go to the next slide.',
        'Swipe up to go to the next project.',
        'Swipe down to go to the previous project.',
    ];
} else {
    tutorials = [
        'Left click to go to the next slide.',
        'Scroll down to go to the next project.',
        'Scroll up to go to the previous project.',
    ];
}

let currentTutorial = 0;

gsap.set(notification, {yPercent: -500});

let tutorialTimeline = gsap.timeline({
    defaults: {duration: .85, ease: "power1.inOut"},
});

function showTutorial() {
    notification.classList.remove('hidden');

    if (sessionStorage.getItem('showTutorial') === 'false') {
        return;
    }

    if (tutorials[currentTutorial] === undefined) {
        return;
    }

    setTimeout(() => {
        notificationText.innerHTML = tutorials[currentTutorial];

        tutorialTimeline.fromTo(notification, {yPercent: -500}, {yPercent: 20})

        if (currentTutorial == 2) {
            sessionStorage.setItem('showTutorial', false);
        }
    }, 2000);
}

function advanceTutorial() {
    if (sessionStorage.getItem('showTutorial') === 'false' && currentTutorial !== 2) {
        return;
    }

    tutorialTimeline.fromTo(notification, {yPercent: 20}, {yPercent: -500});

    currentTutorial++;

    showTutorial();
}

export {advanceTutorial, currentTutorial, showTutorial};
