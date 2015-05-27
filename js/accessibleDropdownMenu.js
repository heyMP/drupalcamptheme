/**
 * Accessible Dropdown Menus
 *
 * Example:
 *  var menu = $('#menu .menu-block-wrapper > .menu');
 *  accessibleDropdownMenu(menu);
 */
module.exports = function(target) {
  (function ($) {
    'use strict';

    /* Setup dropdown menus for IE 6 */
    $("li", target).mouseover(function() {
        $(this).addClass("hover");
    }).mouseout(function() {
        $(this).removeClass("hover");
    });

    /* Make dropdown menus keyboard accessible */

    $("a", target).focus(function() {
        $(this).parents("li").addClass("hover");
    }).blur(function() {
        $(this).parents("li").removeClass("hover");
    });

  })(jQuery);
};
