(function($) {
Drupal.behaviors.viewportUnitsRepaintFix = {
  attach: function (context, settings) {
    // Determine what elements will get repainted
    causeRepaintsOn = $(".site-name__name");

    $(window).resize(function() {
      causeRepaintsOn.css("z-index", 1);
    });
  }
};

Drupal.behaviors.primaryMenu = {
  attach: function (context, settings) {
    $('#menu').click(function() {
      $(this).toggleClass('open');
      $('body').toggleClass('menu-open');
    });
  }
};
})(jQuery);
