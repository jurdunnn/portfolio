const notification = document.querySelector('.notification');
const notificationText = notification.querySelector('.js-notification-text');
const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

const tutorials = {
    'nextSlide': {
        'mobile': 'Touch to go to the next slide.',
        'desktop': 'Left click to go to the next slide.',
        'completed': false,
        'completedByEvents': ['touchend', 'click'],
    },
    'nextProject': {
        'mobile': 'Swipe up to go to the next project.',
        'desktop': 'Scroll down to go to the next project.',
        'completed': false,
        'completedByEvents': ['touchend', 'wheel'],
    },
    'previousProject': {
        'mobile': 'Swipe down to go to the previous project.',
        'desktop': 'Scroll up to go to the previous project.',
        'completed': false,
        'completedByEvents': ['touchend', 'wheel'],
    },
}

let currentTutorial = 0;
let animating = false;

gsap.set(notification, {yPercent: -500});

let tutorialTimeline = gsap.timeline({
    defaults: {duration: .5, ease: "power1.inOut"},
    onComplete: () => (animating = false)
});

function showTutorial() {
    if (getActiveTutorial() === null) {
        return;
    }

    notification.classList.remove('hidden');

    if (sessionStorage.getItem('showTutorial') === 'false') {
        return;
    }

    setTextAndAnimateIn();
}

function advanceTutorial(e) {
    if (animating) {
        return;
    }

    if (Object.keys(tutorials).every(key => tutorials[key].completed === true)) {
        sessionStorage.setItem('showTutorial', false);

        return;
    }

    if (getActiveTutorial() === null || sessionStorage.getItem('showTutorial') === 'false') {
        return;
    }

    if (!getActiveTutorial().completedByEvents.includes(e.type)) {
        return;
    }

    animateOutAndMarkAsCompleted();

    showTutorial();
}

function animateOutAndMarkAsCompleted() {
    animating = true;

    tutorialTimeline.fromTo(notification, {yPercent: 20}, {yPercent: -500});

    getActiveTutorial().completed = true;
}

function setTextAndAnimateIn() {
    animating = true;

    setTimeout(() => {
        notificationText.innerHTML = isMobile ? getActiveTutorial().mobile : getActiveTutorial().desktop;

        tutorialTimeline.fromTo(notification, {yPercent: -500}, {yPercent: 20});
    }, 2000);
}

function getActiveTutorial() {
    let key = Object.keys(tutorials).find(key => tutorials[key].completed === false);

    if (!key) {
        return null;
    }

    return tutorials[key];
}

export {advanceTutorial, currentTutorial, showTutorial};
