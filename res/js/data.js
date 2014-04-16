/*jslint browser: true, indent: 4, regexp: true*/
/*global $*/

(function () {
    'use strict';

    // Display products
    $.getJSON('./res/data/projects.json', function(data) {
        var thumbdiv = '';
        $.each(data, function(j, g) {
            thumbdiv += '<h2 class="thumb-title">'+ j +'</h2>';
            $.each(g, function(i, f) {
                thumbdiv += '<a class="thumb" href="' + f.url + '">' +
                            '<img src="./res/img/thumbs/' + f.thumbnail + '" width="200" height="200" alt="' + i + '" />' +
                            '<span class="desc">' +
                            '<span class="name">' + i + '</span>' +
                            '<span class="more">' + f.price + '</span>' +
                            '</span>' +
                            '</a>';
            });
        });
        $(thumbdiv).appendTo(".artwork > .products");
    }).error(function() {
        var error = '<p>Something in the website broke, but don\'t worry, a team of hamsters is dispatched to fix it.</p>';
        $(error).appendTo(".artwork > .products");
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
            teamdiv += '<a class="thumb" href="' + g.plusurl + '">' +
                       '<img src="./res/img/avatars/' + g.avatar + '" alt="' + g.fullname + '" />' +
                       '<span class="name">' + g.fullname + '</div>' +
                       '</a>';
        });
        $(teamdiv).appendTo(".about > .team");
    }).error(function () {
        var error = '<p>Something in the website broke, but don\'t worry, a team of hamsters is dispatched to fix it.</p>';
        $(error).appendTo(".about > .team");
    });

}());