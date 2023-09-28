import {currentIndex} from '../currentIndex';

let index = currentIndex.getCurrentIndex();

const sections = document.querySelectorAll('section');
let section = sections[index];
let slideNav = section.querySelector('#slide-nav');
let dots = slideNav.querySelectorAll('#slide-dot');
let slideIndex = 0;
let targets = section.querySelectorAll(".slide");

dots[0].classList.add('active');

function handleCurrentIndexChange(updatedIndex) {
    slideIndex = 0;

    index = updatedIndex;

    section = sections[index];

    slideNav = section.querySelector('#slide-nav');

    if (slideNav) {
        dots = slideNav.querySelectorAll('#slide-dot');
    } else {
        dots = null;
    }

    targets = section.querySelectorAll(".slide");

    gsap.set(targets, {xPercent: 100});

    gsap.set(targets[0], {xPercent: 0});

    handleSlideNavChange();
}

currentIndex.addEventListener(handleCurrentIndexChange);

gsap.set(targets, {xPercent: 100});

gsap.set(targets[0], {xPercent: 0});

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
    let newIndex = parseInt(e.target.dataset.slide);

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
    gsap.fromTo(target, {xPercent: 0, zIndex: 0}, {delay: 0.1, duration: 0.8, xPercent: -100, zIndex: -10});
}

function outLeft(target) {
    gsap.fromTo(target, {xPercent: 100, zIndex: 10}, {duration: 0.8, xPercent: 0, zIndex: 0});
}

function inLeft(target) {
    gsap.fromTo(target, {xPercent: -100, zIndex: 0}, {delay: 0, duration: 0.8, xPercent: 0, zIndex: -10});
}

function handleSlideNavChange() {
    if (!dots) return;

    dots.forEach((dot) => dot.classList.remove('active'));

    dots[slideIndex].classList.add('active');
}
