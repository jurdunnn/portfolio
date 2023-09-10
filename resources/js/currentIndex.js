export var currentIndex = (function () {

    var index = -1;

    return {
        getCurrentIndex: function () {
            return index;
        },
        setCurrentIndex: function (newIndex) {
            index = newIndex;
        }
    };
})();
