
$(window).scroll(function(){
    var header = $('#header'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 60) header.addClass('fix-header');
    else header.removeClass('fix-header');
});