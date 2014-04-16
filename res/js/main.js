/*jslint browser: true, indent: 4, regexp: true*/
/*global $*/

(function () {
    'use strict';

    // Detect scroll position
    function detectScroll() {
        if ($(window).scrollTop() >= 1) {
            $(document.body).addClass("scrolled");
        } else {
            $(document.body).removeClass("scrolled");
        }
    }

    detectScroll();
    $(window).scroll(detectScroll);

    // Smooth scroll for in page links
    $("a[href*=#]:not([href=#])").click(function () {
        if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html,body").animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });

    // Show and hide the modal dialog
    function hideDialog() {
        $("body").removeClass("modal-open");
    }

    function showDialog() {
        if (history.pushState) {
            history.pushState(null, '');
        }

        $("body").addClass("modal-open").append("<div class='dim'></div>");
        $(".modal input[name=amount]").focus();

        $(".dim").on('click', function() {
            hideDialog();

            $(this).remove();
        });
    }

    function handleKey(e) {
        if (e.keyCode === 27) {
            hideDialog();
        }
    }

    $(window).keyup(handleKey);
    $(".modal").find("input").keyup(handleKey);

    $(window).on('popstate', hideDialog);

    $(".donate-button").click(showDialog);

    // Style active states in mobile
    document.addEventListener("touchstart", function () {}, true);

}());