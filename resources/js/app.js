import './bootstrap';

const sections = document.querySelectorAll("section");
const images = document.querySelectorAll(".bg");
const headings = gsap.utils.toArray(".section-heading");
const outerWrappers = gsap.utils.toArray(".outer");
const innerWrappers = gsap.utils.toArray(".inner");
const clamp = gsap.utils.clamp(0, sections.length - 1);

document.addEventListener("wheel", handleWheel);
document.addEventListener("touchstart", handleTouchStart);
document.addEventListener("touchmove", handleTouchMove);
document.addEventListener("touchend", handleTouchEnd);

let animating = false,
    currentIndex = -1;

const touch = {
    startX: 0,
    startY: 0,
    dx: 0,
    dy: 0,
    startTime: 0,
    dt: 0
};

const tlDefaults = {
    ease: "slow.inOut",
    duration: 1.25
};

gsap.set(outerWrappers, {yPercent: 100});
gsap.set(innerWrappers, {yPercent: -100});

function gotoSection(index, direction) {
    index = clamp(index); // make sure it's valid

    // we're at the end, so exit
    if (currentIndex === index) {
        return;
    }

    animating = true;
    let fromTop = direction === -1,
        dFactor = fromTop ? -1 : 1,
        tl = gsap.timeline({
            defaults: {duration: 1.25, ease: "power1.inOut"},
            onComplete: () => (animating = false)
        });
    if (currentIndex >= 0) {
        // The first time this function runs, current is -1
        gsap.set(sections[currentIndex], {zIndex: 0});
        tl.to(images[currentIndex], {yPercent: -15 * dFactor}).set(
            sections[currentIndex],
            {autoAlpha: 0}
        );
    }
    gsap.set(sections[index], {autoAlpha: 1, zIndex: 1});
    tl.fromTo(
        [outerWrappers[index], innerWrappers[index]],
        {yPercent: (i) => (i ? -100 * dFactor : 100 * dFactor)},
        {yPercent: 0},
        0
    )
        .fromTo(images[index], {yPercent: 15 * dFactor}, {yPercent: 0}, 0)
        .fromTo(
            headings[index].chars,
            {autoAlpha: 0, yPercent: 150 * dFactor},
            {
                autoAlpha: 1,
                yPercent: 0,
                duration: 1,
                ease: "power2",
                stagger: {
                    each: 0.02,
                    from: "random"
                }
            },
            0.2
        );

    currentIndex = index;
}

function handleWheel(e) {
    if (animating) return;

    e.wheelDeltaY < 0
        ? gotoSection(currentIndex + 1, 1)
        : gotoSection(currentIndex - 1, -1);
}

function handleTouchStart(e) {
    const t = e.changedTouches[0];
    touch.startX = t.pageX;
    touch.startY = t.pageY;
}

function handleTouchMove(e) {
    e.preventDefault();
}

function handleTouchEnd(e) {
    if (animating) return;
    const t = e.changedTouches[0];
    touch.dx = t.pageX - touch.startX;
    touch.dy = t.pageY - touch.startY;
    if (touch.dy > 10) gotoSection(currentIndex - 1, -1);
    if (touch.dy < -10) gotoSection(currentIndex + 1, 1);
}

gotoSection(0, 1);
