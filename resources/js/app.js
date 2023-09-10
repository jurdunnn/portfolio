import './bootstrap';
import {wheel, touchStart, touchMove, touchEnd} from './Modules/sections';

document.addEventListener("wheel", handleWheel);
document.addEventListener("touchstart", handleTouchStart);
document.addEventListener("touchmove", handleTouchMove);
document.addEventListener("touchend", handleTouchEnd);

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
