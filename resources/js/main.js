/**
 * @description: Javascript for numixproject.org
 * @author: Satyajit Sahoo
 */
'use strict';
$(document).ready(function() {
  /**
   * numix project items
   */
  $.getJSON('./resources/data/projects.json', function(data) {
    var thumbdiv = '';
    $.each(data, function(j, g) {
      thumbdiv += '<h1 class="thumb-title">'+ j +'</h1>';
      $.each(g, function(i, f) {
        thumbdiv += '<div class="thumb">'+
                      '<a class="img" href="' + f.url + '">'+
                        '<img src="./resources/img/thumbs/' + f.thumbnail + '" alt="' + i + '" />'+
                      '</a>'+
                      '<div class="desc">'+
                        '<div class="name">'+
                          '<a href="' + f.url + '">' + i + '</a>'+
                        '</div>'+
                        '<div class="more">' + f.price + '</div>'+
                      '</div>'+
                    '</div>';
      });
    });
    $(thumbdiv).appendTo(".thumbgrid");
  }).error(function() {
    var error = '<p>Something in the website broke, but don\'t worry, a team of hamsters is dispatched to fix it.</p>';
    $(error).appendTo(".thumbgrid");
  });

  /**
   * team members
   */
  $.getJSON('./resources/data/team.json', function(data) {
    var teamdiv = '';
    $.each(data, function(j, g) {
      teamdiv += '<div class="profile">'+
                   '<a class="img" href="' + g.plusurl + '">'+
                     '<img src="./resources/img/avatars/' + g.avatar + '" alt="' + g.fullname + '" />'+
                   '</a>'+
                   '<article class="bio">'+
                     '<header><h2>' + g.fullname + '</h2>'+
                     '<p class="subtitle">' + g.role + '</p></header>'+
                     '<p>' + g.bio + '</p>'+
                   '</article>'+
                 '</div>';
    });
    $(teamdiv).appendTo(".team");
  }).error(function() {
    var error = '<p>Something in the website broke, but don\'t worry, a team of hamsters is dispatched to fix it.</p>';
    $(error).appendTo(".team");
  });
  
  /**
   * lazy scroll animations
   */
  $('a[href*=#]:not([href=#])').bind("click", function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({ scrollTop: target.offset().top }, 500);
        return false;
      }
    }
  });
  $('a').each(function() {
    var a = new RegExp('/' + window.location.host + '/');
    if(!a.test(this.href)) {
      $(this).bind("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        window.open(this.href, '_blank');
      });
    }
  });
  var isElementInViewport = function($elem) {
    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
    var viewportTop = $(scrollElem).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    var elemTop = Math.round( $elem.offset().top );
    var elemBottom = elemTop + $elem.height();
    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
  };
  var checkAnimation = function() {
    var elem = $('.thumb img');
    elem.each(function(){
      var $elem = $(this);
      if ($elem.hasClass('active')) return;
      if (isElementInViewport($elem)) {
          var time = Math.floor(1500 * Math.random());
          $elem.hide().fadeIn(time, function(){
            $(this).addClass('active');
          });
      }
    });
  };
  $(window).scroll(function(){
    checkAnimation();
  });
  
  /**
   * clouds in the sky
   */
  $('.objects span').each(function(){
      var tOp = Math.floor(Math.random() * (200 - 50));
      $(this).css({top: tOp});
  });
  var loop = function(cloud) {
    var time = Math.floor(Math.random() * (25000 - 15000) + 10000 );
    var rIght = -(Math.floor(Math.random()* (1000 - 250 ) + 250));
    $('.objects span:nth-child('+cloud+')').css({right: rIght});
    var wDth = $(document).width() - rIght;
    $('.objects span:nth-child('+ cloud +')').animate ({ right: '+='+wDth },
        time, 'linear', function() {
            loop(cloud);
    });
  };
  var cloud = 1;
  $('.objects span').each(function(){
      loop(cloud);
      cloud++;
  });
});
