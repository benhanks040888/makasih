$(function() {
  FastClick.attach(document.body);

  // fake preloader
  setTimeout(function() {
    $('.loader').addClass('out');
  }, 500);

  new WOW().init();

  $('nav > a').on('click', function(e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 800);
  });

  $('nav > a').on('mouseenter', function() {
    $('nav').addClass('jelly');
  })
  .on('mouseout', function() {
    $('nav').removeClass('jelly');
  });
});