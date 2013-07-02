(function($) {

  $(window).load(function() {

    // initialize Isotope
    $('#portfolio').isotope({
      itemSelector : '.portfolio-item',
      layoutMode: 'fitRows'
    });

    // Load portfolio filter based on URL hash
    var category = window.location.hash.substr(1);
    if (category) {
      $('a[data-filter=".post-'+category+'"]').click(); //clicks on element specified by hash
    }
  });

  // Update portfolio item width on window resize
  $(window).smartresize(function() {
    $('#portfolio').isotope({
      layoutMode: 'fitRows'
    });
  });

  // Trigger link when clicking on overlay text (Internet Explorer Fix)
  $("#portfolio .title-overlay").bind('mouseup', function() {
    window.location = $(this).attr('href');
  });

  // On click and mouseover, fade in portfolio text and fit container
  $("#portfolio .portfolio-item").bind('click mouseenter', function() {
    $('.title-overlay', this).fadeIn(function(){
      $(this).css('pointer-events', 'auto');
    });
    $("#portfolio .portfolio-item .title-overlay").dotdotdot();
  });

  // On mouse exits, fade out portfolio text
  $("#portfolio .portfolio-item").bind('mouseleave', function() {
    $('.title-overlay', this).stop().fadeOut('fast', function() {
      $(this).css('pointer-events', 'none');
    });
  });

  // Functionality for portfolio categority filtering
  $('#filters a').click(function() {
    $(this).parent().siblings().children('a').removeClass('selected');
    $(this).addClass('selected');
    $('#portfolio').isotope({ filter: $(this).attr('data-filter') });
  });

  // Slide-toggle functionality for mobile version of portfolio category filter.
  $('#filters-menu a').click(function(e) {
    $(this).parent().siblings('#filters').stop().slideToggle();
  });

})(jQuery);
