$(window).scroll(function () {
    var header = $('#header'),
        scroll = $(window).scrollTop(),
        logo = $('#header #logo img')

    if (scroll >= 60) {
        header.addClass('fix-header')
        logo.removeClass('hide')
    } else {
        header.removeClass('fix-header')
        logo.addClass('hide')
    }
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
                600: {
                    margin: 20,
                    nav: true,
                    items: 4
                },
                1000: {
                    margin: 30,
                    stagePadding: 0,
                    nav: true,
                    items: 4
                },
                1200: {
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