var swiper;
function initSwiper() {
    var screenWidth = window.innerWidth;
    if(swiper) { swiper.destroy(true, true); }

    swiper = new Swiper('.swiper-container', {
        direction: screenWidth <= 1200 ? 'vertical' : 'horizontal',
        spaceBetween: 100,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        mousewheel: {
            sensitivity: 0.4,
            releaseOnEdges: false,
        },
        keyboard: true,
        freeMode: true,
        freeModeMomentum: true,
        freeModeMomentumRatio: 0.7,
        freeModeMomentumVelocityRatio: 0.7,
        speed: 400,
        breakpoints: {
            1200: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1600: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            1900: {
                slidesPerView: 4,
                spaceBetween: 50
            }
        }
    });
}


initSwiper();


window.addEventListener('resize', function() {
    initSwiper();
});
