import {currentIndex} from '../currentIndex';

let index = currentIndex.getCurrentIndex();

const sections = document.querySelectorAll('section');
let section = sections[index];
let count = 0;
let targets = section.querySelectorAll(".slide");

section.querySelector('.nextButton').addEventListener("click", slideOneNext);
section.querySelector('.prevButton').addEventListener("click", slideOnePrev);

function handleCurrentIndexChange(updatedIndex) {
    count = 0;

    index = updatedIndex;

    section = sections[index];

    targets = section.querySelectorAll(".slide");

    gsap.set(targets, {xPercent: 100});

    gsap.set(targets[0], {xPercent: 0});

    section.querySelector('.nextButton').addEventListener("click", slideOneNext);
    section.querySelector('.prevButton').addEventListener("click", slideOnePrev);
}

currentIndex.addEventListener(handleCurrentIndexChange);

gsap.set(targets, {xPercent: 100});

gsap.set(targets[0], {xPercent: 0});

function slideOneNext() {
    gsap.fromTo(targets[count], {xPercent: 0, zIndex: 0}, {delay: 0.2, duration: 0.8, xPercent: -100, zIndex: -10});

    count = count < targets.length - 1 ? ++count : 0;

    gsap.fromTo(targets[count], {xPercent: 100, zIndex: 10}, {duration: 0.8, xPercent: 0, zIndex: 0});
}

function slideOnePrev() {
    if (count === 0) return;

    gsap.fromTo(targets[count], {xPercent: 0, zIndex: 10}, {xPercent: 100, zIndex: 0});

    count = count < targets.length ? --count : 0;

    gsap.fromTo(targets[count], {xPercent: -100, zIndex: 0}, {delay: 0, duration: 0.8, xPercent: 0, zIndex: -10});
}
