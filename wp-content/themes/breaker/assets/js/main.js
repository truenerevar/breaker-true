$(function() {
  //header band text
  $('.sub-slogan').circleType({radius: 384, dir:-1});
  $('.other-header-txt').circleType({radius: 384, dir:-1});
  //toggle menu
  $('.menu-toggle').click(function() {
    $('.menu').slideToggle( 'fast' );
    if ($(this).hasClass('fa-times')) {
      $(this).removeClass('fa-times').addClass('fa-bars');
    } else {
      $(this).removeClass('fa-bars').addClass('fa-times');
    }
  });

  $( window ).resize(function() {
    if ($(document).width() > 767) {
      $('.menu').show();
    }
  });
  //Chrome Smooth Scroll
  try {
    $.browserSelector();
    if($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch(err) {

  };

  $("img, a").on("dragstart", function(event) { event.preventDefault(); });

  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });

    $('.client-slider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 210,
      itemMargin: 5
    });
  });
});