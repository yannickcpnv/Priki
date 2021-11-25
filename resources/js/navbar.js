/**
 * Handle toggles on click in navbar.
 *
 * @param {string[]} classNames Name of classes that have a toggle.
 */
function handleNavClickToggles(classNames)
{
    classNames.forEach(function(cls) {
        const navbarBurgers = Array.prototype.slice.call(
            document.querySelectorAll(cls),
            0,
        );

        navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
                const target = document.getElementById(el.dataset.target);

                // Toggle the "is-active" class on both element and menu
                el.classList.toggle('is-active');
                target.classList.toggle('is-active');

                let bodyEl = document.querySelector('main');
                const listener = function(e) {
                    if (e.target !== document.getElementsByClassName(cls)) {
                        el.classList.remove('is-active');
                        target.classList.remove('is-active');
                        bodyEl.removeEventListener('click', listener);
                    }
                };
                bodyEl.addEventListener('click', listener);
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    handleNavClickToggles(['.navbar-burger', '.has-dropdown']);
});
