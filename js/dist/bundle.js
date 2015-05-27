(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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

},{}],2:[function(require,module,exports){
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

},{"./accessibleDropdownMenu.js":1}]},{},[2]);
