(function () {
    const sliders = [...document.querySelectorAll('.testimony__body')];
    const buttonNext = document.querySelector('#next');
    const buttonBefore = document.querySelector('#before');
    let value;
    let intervalId;

    buttonNext.addEventListener('click', () => {
        changePosition(1);
    });

    buttonBefore.addEventListener('click', () => {
        changePosition(-1);
    });

    // Función para iniciar el movimiento automático
    const startAutoSlide = () => {
        intervalId = setInterval(() => {
            changePosition(1);
        }, 7000); // Cambia el valor 5000 a la cantidad de milisegundos que desees entre cada transición automática
    };

    // Función para detener el movimiento automático
    const stopAutoSlide = () => {
        clearInterval(intervalId);
    };

    // Inicia el movimiento automático cuando carga la página
    startAutoSlide();

    // Agrega listeners para detener el movimiento automático cuando el mouse está sobre el slider
    sliders.forEach(slider => {
        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);
    });

    const handleTouchStart = (event) => {
        touchStartX = event.touches[0].clientX;
        console.log('Touch start:', touchStartX);
    };
    
    const handleTouchMove = (event) => {
        touchEndX = event.touches[0].clientX;
        console.log('Touch move:', touchEndX);
        handleGesture();
    };
    
    const handleGesture = () => {
        if (touchStartX - touchEndX > 20) {
            // Deslizamiento hacia la izquierda, siguiente testimonio
            changePosition(1);
        } else if (touchEndX - touchStartX > 20) {
            // Deslizamiento hacia la derecha, testimonio anterior
            changePosition(-1);
        }
        // Puedes ajustar el valor (50) según tus necesidades para determinar cuánto debe deslizarse para considerarse un gesto válido.
    };
    

    const changePosition = (add) => {
        const currentTestimony = document.querySelector('.testimony__body--show').dataset.id;
        value = Number(currentTestimony);
        value += add;

        sliders[Number(currentTestimony) - 1].classList.remove('testimony__body--show');
        if (value === sliders.length + 1 || value === 0) {
            value = value === 0 ? sliders.length : 1;
        }

        sliders[value - 1].classList.add('testimony__body--show');
    }
})();
