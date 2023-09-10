import {currentIndex} from '../currentIndex';

let index = currentIndex.getCurrentIndex();

const sections = document.querySelectorAll('section');
let section = sections[index];

let count = 0;

const targets = section.querySelectorAll(".slide");

function handleCurrentIndexChange(updatedIndex) {
    index = updatedIndex;
    console.log('Current index changed:', updatedIndex);
}

currentIndex.addEventListener(handleCurrentIndexChange);

nextButton.addEventListener("click", slideOneNext);
prevButton.addEventListener("click", slideOnePrev);

gsap.set(targets, {xPercent: 100});

console.log(targets[0]);
gsap.set(targets[0], {xPercent: 0});

function slideOneNext() {
    gsap.fromTo(targets[count], {xPercent: 0, zIndex: 0}, {delay: 0.2, duration: 1.2, xPercent: -100, zIndex: -10});

    count = count < targets.length - 1 ? ++count : 0;

    gsap.fromTo(targets[count], {xPercent: 100, zIndex: 10}, {duration: 1.2, xPercent: 0, zIndex: 0});
}

function slideOnePrev() {
    gsap.fromTo(targets[count], {xPercent: 0, zIndex: 10}, {xPercent: 100, zIndex: 0});

    count = count < targets.length ? --count : 0;

    gsap.fromTo(targets[count], {xPercent: -100, zIndex: 0}, {delay: 0, duration: 1.2, xPercent: 0, zIndex: -10});
}
