document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.carousel-item');
    let currentItem = 0;

    function updateCarousel() {
        const translateXValue = currentItem * -100 / 3; // Adjust for width
        document.querySelector('#default-carousel .relative').style.transform = `translateX(${translateXValue}%)`;
    }

    document.querySelector('[data-carousel-prev]').addEventListener('click', function () {
        currentItem = (currentItem - 1 + items.length) % items.length;
        updateCarousel();
    });

    document.querySelector('[data-carousel-next]').addEventListener('click', function () {
        currentItem = (currentItem + 1) % items.length;
        updateCarousel();
    });

    // Initial load
    updateCarousel();
});
