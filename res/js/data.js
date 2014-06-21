/*jslint browser: true, indent: 4, regexp: true*/
/*global $*/

(function () {
    'use strict';

    var errormsg = '<p>Something in the website broke, but don\'t worry, a team of hamsters is dispatched to fix it.</p>';

    // Display products
    $.getJSON('./res/data/projects.json', function(data) {
        var thumbdiv = '';

        $.each(data, function(j, g) {
            var thumbcontent = '';

            $.each(g, function(i, f) {
                thumbcontent += '<a class="product thumb-1" href="' + f.url + '">' +
                            '<img src="./res/img/thumbs/' + f.thumbnail + '" width="200" height="200" alt="' + i + '" />' +
                            '<span class="desc">' +
                            '<span class="name">' + i + '</span>' +
                            '<span class="more">' + f.price + '</span>' +
                            '</span>' +
                            '</a>';
            });

            thumbdiv += '<h2 class="thumb-title">'+ j +'</h2><div class="category">' + thumbcontent + '</div>';
        });

        $(thumbdiv).appendTo(".artwork > .products");
    }).error(function() {
        $(errormsg).appendTo(".artwork > .products");
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
            teamdiv += '<a class="member thumb-1" href="' + g.plusurl + '">' +
                       '<img src="./res/img/avatars/' + g.avatar + '" alt="' + g.fullname + '" />' +
                       '<span class="name">' + g.fullname + '</div>' +
                       '</a>';
        });

        $(teamdiv).appendTo(".about > .team");
    }).error(function () {
        $(errormsg).appendTo(".about > .team");
    });

}());
