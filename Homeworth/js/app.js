$(document).ready(function () {
    // owl carousel slider for the homepage
    $('.hero-slider').owlCarousel({
        loop: true,
        margin:0,
        items: 1,
        dots: false,
        navText: ['PREV', 'NEXT'],
        smartSpeed:1000,
        autoplay: true,
        autoplayTimeout: 7000,
        responsive: {
            0:{
                nav:false
            },
            768: {
                nav:true,
            }
        }
    })
    // Owl Project Slider
    $('#project-slider').owlCarousel({
        loop: true,
        nav: false,
        items: 2,
        dots: true,
        smartSpeed: 600,
        center: true,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
                margin: 8,
            }
        }
    })
    // Owl Reviews Slider
    $('.reviews-slider').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        smartSpeed: 900,
        items: 1,
        margin:24,
        autoplay: true,
        autoplayTimeout: 4000,
    })
});