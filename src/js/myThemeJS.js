jQuery(function($) {
  //Check to see if the window is top if not then display button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.pagetop').fadeIn();
    } else {
      $('.pagetop').fadeOut();
    }
  });
  //Click event to scroll to top
  $('.pagetop').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
});
