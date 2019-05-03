$(window).scroll(function () {
    var header = $('#header'),
        scroll = $(window).scrollTop(),
        logo = $('#header #logo img'),
        home_nav = $('#mobile-bar.home'),
        product_nav = $('#mobile-bar.product'),
        team_nav = $('#mobile-bar.team')

    if (scroll >= 60) {
        header.addClass('fix-header')
        logo.removeClass('hide').addClass('show')
    } else {
        if (scroll == 0) {
            header.removeClass('fix-header')
            logo.addClass('hide').removeClass('show')
        }
    }

    if (scroll >= 240) {
        home_nav.removeClass('close').addClass('open')
    } else {
        if (scroll == 0) {
            home_nav.addClass('close').removeClass('open')
        }
    }

    if (scroll >= 180) {
        product_nav.removeClass('close').addClass('open')
        team_nav.removeClass('close').addClass('open')
    } else {
        if (scroll == 0) {
            product_nav.addClass('close').removeClass('open')
            team_nav.addClass('close').removeClass('open')
        }
    }
});

$('.menu-button').click(function(){
    if($(this).hasClass("close")){
        $(this).addClass('open').removeClass('close')
        $('.sidebar').addClass('close').removeClass('open')
    }else{
        $(this).addClass('close').removeClass('open')
        $('.sidebar').addClass('open').removeClass('close')
    }
})

$(".button.try-it").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#our-products").offset().top - 60
    }, 500);
});

var carousel = function () {
    if ($('.our-themes').length > 0) {
        $('.our-themes').owlCarousel({
            center: false,
            items: 8,
            loop: true,
            stagePadding: 0,
            margin: 0,
            autoplay: false,
            nav: true,
            dots: true,
            navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
            responsive: {

                0:{
                    margin: 20,
                    nav: true,
                    items: 1
                },

                400: {
                    margin: 20,
                    nav: true,
                    items: 2
                },
                900: {
                    margin: 30,
                    stagePadding: 0,
                    nav: true,
                    items: 4
                },
                1600: {
                    margin: 30,
                    stagePadding: 0,
                    nav: true,
                    items: 4
                }
            }
        });
    }

    $('.slide-one-item').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        autoplay: true,
        pauseOnHover: false,
        nav: true,
        navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
    });
};
carousel();