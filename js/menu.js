(function () {
    const openButton = document.querySelector('.nav__menu');
    const menu = document.querySelector('.nav__link');
    const closeMenu = document.querySelector('.nav__close');

    openButton.addEventListener('click', () => {
        menu.classList.add('nav__link--show');
    });

    closeMenu.addEventListener('click', () => {
        menu.classList.remove('nav__link--show');
    });

    // Agrega este bloque de código para cerrar el menú al hacer clic en un enlace
    const navLinks = document.querySelectorAll('.nav__links');

    navLinks.forEach((link) => {
        link.addEventListener('click', () => {
            menu.classList.remove('nav__link--show');
        });
    });
})();
