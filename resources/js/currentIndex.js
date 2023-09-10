const currentIndex = {
    value: -1,
    listeners: [],

    getCurrentIndex() {
        return this.value;
    },

    setCurrentIndex(index) {
        this.value = index;

        this.notifyListeners();
    },

    addEventListener(listener) {
        this.listeners.push(listener);
    },

    notifyListeners() {
        this.listeners.forEach(listener => {
            listener(this.value);
        });
    }
};

export {currentIndex}
