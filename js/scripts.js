var accessibleDropdownMenu = require('./accessibleDropdownMenu.js');

(function ($) {
  'use strict';

  objectFit.polyfill({
      selector: 'img', // this can be any CSS selector
      fittype: 'cover', // either contain, cover, fill or none
      disableCrossDomain: 'true' // either 'true' or 'false' to not parse external CSS files.
  });

  Drupal.behaviors.viewportUnitsRepaintFix = {
    attach: function (context, settings) {
      // Determine what elements will get repainted
      var causeRepaintsOn = $(".site-name__name");

      $(window).resize(function() {
        causeRepaintsOn.css("z-index", 1);
      });
    }
  };

  Drupal.behaviors.primaryMenu = {
    attach: function (context, settings) {
      var menu = $('#menu .menu-block-wrapper > .menu');
      accessibleDropdownMenu(menu);

      $('#menu').click(function() {
        $(this).toggleClass('open');
        $('body').toggleClass('menu-open');
      });
    }
  };

})(jQuery);
