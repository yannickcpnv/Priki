window.confirmWithPopup = (message, event) => {
    if (!confirm(message)) {
        event.preventDefault();
    }
};
