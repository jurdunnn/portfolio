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

let animating = false;

gsap.set(notification, {yPercent: -500});

const tutorialTimeline = gsap.timeline({
    defaults: {duration: 0.4, ease: "power1.inOut"},
    onComplete: () => (animating = false),
});

function showTutorial() {
    const activeTutorial = getActiveTutorial();

    if (activeTutorial === null) {
        return;
    }

    notification.classList.remove("hidden");

    if (sessionStorage.getItem("showTutorial") === "false") {
        return;
    }

    setTextAndAnimateIn();
}

let lastAdvanceTime = 0;

function advanceTutorial(event) {
    const currentTime = Date.now();

    if (currentTime - lastAdvanceTime > 2500) {
        lastAdvanceTime = currentTime;
    } else {
        return;
    }

    const allTutorialsCompleted = Object.values(tutorials).every(
        (tutorial) => tutorial.completed === true
    );

    if (allTutorialsCompleted) {
        sessionStorage.setItem("showTutorial", false);
        return;
    }

    const activeTutorial = getActiveTutorial();

    if (activeTutorial === null || sessionStorage.getItem("showTutorial") === "false") {
        return;
    }

    if (!activeTutorial.completedByEvents.includes(event.type)) {
        return;
    }

    if (!animating) {
        animateOutAndMarkAsCompleted();

        showTutorial();
    }
}

function animateOutAndMarkAsCompleted() {
    animating = true;

    tutorialTimeline.fromTo(notification, {yPercent: 20}, {yPercent: -500});

    getActiveTutorial().completed = true;
}

function setTextAndAnimateIn() {
    animating = true;

    setTimeout(() => {
        const activeTutorial = getActiveTutorial();

        const tutorialText = isMobile ? activeTutorial.mobile : activeTutorial.desktop;

        notificationText.innerHTML = tutorialText;

        tutorialTimeline.fromTo(notification, {yPercent: -500}, {yPercent: 20});
    }, 2000);
}

function getActiveTutorial() {
    const activeTutorialKey = Object.keys(tutorials).find(
        (key) => tutorials[key].completed === false
    );

    if (!activeTutorialKey) {
        return null;
    }

    return tutorials[activeTutorialKey];
}

export {advanceTutorial, showTutorial};
