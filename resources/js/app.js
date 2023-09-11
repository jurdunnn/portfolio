import './bootstrap';
import {wheel, touchStart, touchMove, touchEnd} from './Modules/sections';
import {slideOneNext, slideOnePrev} from './Modules/slides';

let lastClickTime = 0;

document.addEventListener("wheel", handleWheel);
document.addEventListener("touchstart", handleTouchStart);
document.addEventListener("touchmove", handleTouchMove);
document.addEventListener("touchend", handleTouchEnd);
document.addEventListener('click', function (e) {
    const currentTime = Date.now();

    if (currentTime - lastClickTime > 500) {
        lastClickTime = currentTime;

        handleClick(e);
    }
});

function handleWheel(e) {
    wheel(e);
}

function handleTouchStart(e) {
    touchStart(e);
}

function handleTouchEnd(e) {
    touchEnd(e);
}

function handleTouchMove(e) {
    touchMove(e);
}

function handleClick(e) {
    if (e.target.localName === "a") {
        return;
    }

    if (e.shiftKey) {
        slideOnePrev();
    } else {
        slideOneNext();
    }
}
