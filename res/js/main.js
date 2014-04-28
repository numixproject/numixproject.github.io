/*jslint browser: true, indent: 4, regexp: true*/
/*global $*/

(function () {
    'use strict';

    // Simple parallax scroll
    $('section[data-speed]').each(function(){
        var $bgimg = $(this);

        $(window).scroll(function() {
            var pos = ($(window).scrollTop() / $bgimg.data('speed')) * -1;

            // Put together our final background position
            var coords = '50% '+ pos + 'px';

            // Move the background
            $bgimg.css({ "background-position" : coords });
        });
    });

    // Smooth scroll for in page links
    $("a[href*=#]:not([href=#])").click(function(e) {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $("[id=" + this.hash.slice(1) + "]");
            if (target.length) {
                if (typeof document.body.style.transitionProperty === 'string') {
                    e.preventDefault();
                    $("html").css({
                        "margin-top" : ( ( target.offset().top - $(window).scrollTop() ) * -1 ) + "px",
                        "transition" : "margin-top .5s ease-in-out"
                    }).data("transitioning", true);
                    $("html").on("transitionend webkitTransitionEnd msTransitionEnd oTransitionEnd", function (e) {
                        if (e.target === e.currentTarget && $(this).data("transitioning") === true) {
                            $(this).removeAttr("style").data("transitioning", false);
                            $("html, body").scrollTop(target.offset().top);
                        }
                    });
                } else {
                    $("html, body").animate({
                        scrollTop: target.offset().top
                    }, 500);
                    return false;
                }
            }
        }
    });

    // Show and hide the modal dialog
    function showDialog() {
        if (history.pushState) {
            history.pushState(null, '');
        }

        $("body").addClass("modal-open").append("<div class='dim'></div>");
        $(".modal input[name=amount]").focus();
    }

    function hideDialog() {
        $("body").removeClass("modal-open");
        $(".dim").remove();
    }

    function handleKey(e) {
        if (e.keyCode === 27) {
            hideDialog();
        }
    }

    $(".donate-button").click(showDialog);
    $(document).on("click", ".dim", hideDialog);
    $(window).on('popstate', hideDialog);

    // Style active states in mobile
    document.addEventListener("touchstart", function () {}, true);

}());
