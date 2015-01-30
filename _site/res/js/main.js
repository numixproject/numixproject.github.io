/* jslint browser: true, indent: 4, regexp: true */
/* global $, lace */

$(function() {
    // Simple parallax scroll
    $("section[data-speed]").each(function(){
        var $bgimg = $(this);

        $(window).on("scroll", function() {
            var pos = ($(this).scrollTop() / $bgimg.data("speed")) * -1,
                coords = "50% " + pos + "px";

            // Move the background
            $bgimg.css({ "background-position" : coords });
        });
    });

    // Smooth scroll for in page links
    $(function(){
        var target,
            scroll;

        $("a[href*=#]:not([href=#])").on("click", function(e) {
            if (location.pathname.replace(/^\//,"") === this.pathname.replace(/^\//,"") && location.hostname === this.hostname) {
                target = $(this.hash);
                target = target.length ? target : $("[id=" + this.hash.slice(1) + "]");

                if (target.length) {
                    if (typeof document.body.style.transitionProperty === "string") {
                        e.preventDefault();

                        var avail = $(document).height() - $(window).height();

                        scroll = target.offset().top;

                        if (scroll > avail) {
                            scroll = avail;
                        }

                        $("html").css({
                            "margin-top" : ( $(window).scrollTop() - scroll ) + "px",
                            "transition" : ".5s ease-in-out"
                        }).data("transitioning", true);
                    } else {
                        $("html, body").animate({
                            scrollTop: scroll
                        }, 500);
                        return;
                    }
                }
            }
        });

        $("html").on("transitionend webkitTransitionEnd msTransitionEnd oTransitionEnd", function (e) {
            if (e.target === e.currentTarget && $(this).data("transitioning")) {
                $(this).removeAttr("style").data("transitioning", false);
                $("html, body").scrollTop(scroll);
                return;
            }
        });
    });

    // Show donate dialog
    $(".donate-button").on("click", function() {
       lace.modal.show({ body: $("#donate-dialog").html() });
    });

    // Display products
    var $errormsg = $("<p>").text("Something in the website broke, but don't worry, a team of hamsters is dispatched to fix it.");

    $.getJSON("./res/data/projects.json", function(data) {
        var thumbdiv = "";

        $.each(data, function(j, g) {
            var thumbcontent = "";

            $.each(g, function(i, f) {
                thumbcontent += '<a class="product block-1" href="' + f.url + '">' +
                    '<img src="./res/img/thumbs/' + f.thumbnail + '" width="200" height="200" alt="' + i + '" />' +
                    '<span class="desc">' +
                    '<span class="name">' + i + '</span>' +
                    '<span class="more">' + f.price + '</span>' +
                    '</span>' +
                    '</a>';
            });

            thumbdiv += '<h2 class="thumb-title">'+ j +'</h2><div class="category row">' + thumbcontent + '</div>';
        });

        $(thumbdiv).appendTo(".artwork .products");
    }).error(function() {
        $errormsg.appendTo(".artwork .products");
    });

    // Make entire div clickable
    $(".thumb").click(function() {
        window.location=$(this).find("a").attr("href");
        return false;
    });

    // Display team members
    $.getJSON('./res/data/team.json', function (data) {
        var teamdiv = '';

        $.each(data, function (j, g) {
            teamdiv += '<a class="member block-1" href="' + g.plusurl + '">' +
                '<img src="./res/img/avatars/' + g.avatar + '" alt="' + g.fullname + '" />' +
                '<span class="name">' + g.fullname + '</div>' +
                '</a>';
        });

        $(teamdiv).appendTo(".about .team");
    }).error(function () {
        $errormsg.appendTo(".about .team");
    });

    // Style active states in mobile
    document.addEventListener("touchstart", function () {}, true);
});
