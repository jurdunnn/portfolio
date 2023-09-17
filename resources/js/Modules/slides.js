import {currentIndex} from '../currentIndex';

let index = currentIndex.getCurrentIndex();

const sections = document.querySelectorAll('section');
let section = sections[index];
let slideIndex = 0;
let targets = section.querySelectorAll(".slide");

function handleCurrentIndexChange(updatedIndex) {
    slideIndex = 0;

    index = updatedIndex;

    section = sections[index];

    targets = section.querySelectorAll(".slide");

    gsap.set(targets, {xPercent: 100});

    gsap.set(targets[0], {xPercent: 0});
}

currentIndex.addEventListener(handleCurrentIndexChange);

gsap.set(targets, {xPercent: 100});

gsap.set(targets[0], {xPercent: 0});

export function slideOneNext() {
    if (targets.length === 1) {
        return;
    }

    gsap.fromTo(targets[slideIndex], {xPercent: 0, zIndex: 0}, {delay: 0.2, duration: 0.8, xPercent: -100, zIndex: -10});

    slideIndex = slideIndex < targets.length - 1 ? ++slideIndex : 0;

    gsap.fromTo(targets[slideIndex], {xPercent: 100, zIndex: 10}, {duration: 0.8, xPercent: 0, zIndex: 0});
}

export function slideOnePrev() {
    if (slideIndex === 0) return;

    gsap.fromTo(targets[slideIndex], {xPercent: 0, zIndex: 10}, {xPercent: 100, zIndex: 0});

    slideIndex = slideIndex < targets.length ? --slideIndex : 0;

    gsap.fromTo(targets[slideIndex], {xPercent: -100, zIndex: 0}, {delay: 0, duration: 0.8, xPercent: 0, zIndex: -10});
}
