import {currentIndex} from '../currentIndex';

const sections = document.querySelectorAll("section");
const backgrounds = document.querySelectorAll(".bg");
const headings = gsap.utils.toArray(".section-heading");
const header = document.querySelector('header');
const outerWrappers = gsap.utils.toArray(".outer");
const innerWrappers = gsap.utils.toArray(".inner");
const clamp = gsap.utils.clamp(0, sections.length - 1);

let animating = false;

const touch = {
    startX: 0,
    startY: 0,
    dx: 0,
    dy: 0,
    startTime: 0,
    dt: 0
};

gsap.set(outerWrappers, {yPercent: 100});

gsap.set(innerWrappers, {yPercent: -100});

function gotoSection(index, direction) {
    index = clamp(index);

    if (index === sections.length - 1) {
        index = 0;
    }

    if (currentIndex.getCurrentIndex() === index) {
        return;
    }

    animating = true;

    let fromTop = direction === -1,
        dFactor = fromTop ? -1 : 1,
        hasPrimaryText = headings[index].className.includes('text-primary'),
        tl = gsap.timeline({
            defaults: {duration: .85, ease: "power1.inOut"},
            onComplete: () => (animating = false)
        });

    if (currentIndex.getCurrentIndex() >= 0) {
        gsap.set(sections[currentIndex.getCurrentIndex()], {zIndex: 0});

        tl.to(backgrounds[currentIndex.getCurrentIndex()], {yPercent: -15 * dFactor}).set(
            sections[currentIndex.getCurrentIndex()],
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
        .fromTo(backgrounds[index], {yPercent: 15 * dFactor}, {yPercent: 0}, 0)
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

    hasPrimaryText ?
        tl.to(header, {color: '#4f6d7a'}, 0.1)
        : tl.to(header, {color: '#c0d6df'}, 0.1);

    currentIndex.setCurrentIndex(index);
}

export function wheel(e) {
    if (animating) return;

    e.wheelDeltaY < 0
        ? gotoSection(currentIndex.getCurrentIndex() + 1, 1)
        : gotoSection(currentIndex.getCurrentIndex() - 1, -1);
}

export function touchStart(e) {
    const t = e.changedTouches[0];

    touch.startX = t.pageX;

    touch.startY = t.pageY;
}

export function touchMove(e) {
    e.preventDefault();
}

export function touchEnd(e) {
    if (animating) return;

    const t = e.changedTouches[0];

    touch.dx = t.pageX - touch.startX;

    touch.dy = t.pageY - touch.startY;

    if (touch.dy > 10) gotoSection(currentIndex.getCurrentIndex() - 1, -1);

    if (touch.dy < -10) gotoSection(currentIndex.getCurrentIndex() + 1, 1);
}

gotoSection(0, 1);
