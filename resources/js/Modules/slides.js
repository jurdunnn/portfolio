import {currentIndex} from '../currentIndex';

let index = currentIndex.getCurrentIndex();

const sections = document.querySelectorAll('section');
const slideNav = document.querySelector('#slide-nav');
const dots = document.querySelectorAll('#slide-dot');
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

gsap.set(slideNav, {opacity: 0});

export function slideOneNext() {
    if (targets.length === 1) {
        return;
    }

    inRight(targets[slideIndex]);

    slideIndex = slideIndex < targets.length - 1 ? ++slideIndex : 0;

    outLeft(targets[slideIndex]);

    handleSlideNavChange();
}

export function slideOnePrev() {
    if (slideIndex === 0) return;

    outRight(targets[slideIndex]);

    slideIndex = slideIndex < targets.length ? --slideIndex : 0;

    inLeft(targets[slideIndex]);

    handleSlideNavChange();
}

export function goToSlide(e) {
    let newIndex = parseInt(e.target.dataset.slide) + 1;

    if (newIndex === slideIndex) {
        return;
    }

    // True for right, False for left.
    let direction = newIndex > slideIndex ? true : false;

    if (direction) {
        inRight(targets[slideIndex]);
    } else {
        outRight(targets[slideIndex]);
    }

    slideIndex = newIndex;

    if (direction) {
        outLeft(targets[slideIndex]);
    } else {
        inLeft(targets[slideIndex]);
    }

    handleSlideNavChange();
}

function outRight(target) {
    gsap.fromTo(target, {xPercent: 0, zIndex: 10}, {xPercent: 100, zIndex: 0});
}

function inRight(target) {
    gsap.fromTo(target, {xPercent: 0, zIndex: 0}, {delay: 0.2, duration: 0.8, xPercent: -100, zIndex: -10});
}

function outLeft(target) {
    gsap.fromTo(target, {xPercent: 100, zIndex: 10}, {duration: 0.8, xPercent: 0, zIndex: 0});
}

function inLeft(target) {
    gsap.fromTo(target, {xPercent: -100, zIndex: 0}, {delay: 0, duration: 0.8, xPercent: 0, zIndex: -10});
}

function handleSlideNavChange() {
    if (slideIndex > 0) {
        var delay = slideIndex === 1 ? 0.6 : 0;

        gsap.fromTo(slideNav, {opacity: 0}, {delay: delay, opacity: 100});

        dots.forEach((dot) => dot.classList.remove('active'));

        dots[slideIndex - 1].classList.add('active');
    } else {
        gsap.fromTo(slideNav, {opacity: 100}, {delay: 0.05, duration: 0.4, opacity: 0});
    }
}
