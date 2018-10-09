/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(function($) {
  // Site title and description.
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function(value) {
    value.bind(function(to) {
      $('.site-description').text(to);
    });
  });
  // Header text color.
  wp.customize('header_textcolor', function(value) {
    value.bind(function(to) {
      if ('blank' === to) {
        $('.site-title a, .site-description').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('.site-title a, .site-description').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  // Header background color.
  wp.customize('themename_header_bgcolor', function(value) {
    value.bind(function(newval) {
      $('header.site-header').css({
        'background-color': newval
      });
    });
  });
  // Footer background color.
  wp.customize('themename_footer_bgcolor', function(value) {
    value.bind(function(newval) {
      $('footer.site-footer').css({
        'background-color': newval
      });
    });
  });
  // Footer copyright text color.
  wp.customize('themename_copyright_txtcolor', function(value) {
    value.bind(function(newval) {
      $('.footer-widget>.textwidget').css({
        'color': newval
      });
    });
  });
  // Text color.
  wp.customize('themename_txtcolor', function(value) {
    value.bind(function(newval) {
      $('body').css({
        'color': newval
      });
    });
  });
  // Link text hover color.
  wp.customize('themename_link_hover_txtcolor', function(value) {
    value.bind(function(newval) {
      $('a:hover').css({
        'color': newval
      });
    });
  });
  // Link text hover color.
  wp.customize('themename_link_hover_txtcolor', function(value) {
    value.bind(function(newval) {
      $('a:hover').css({
        'color': newval
      });
    });
  });
  // Menu background color.
  wp.customize('themename_menu_bgcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu ul li').css({
        'background-color': newval
      });
    });
  });
  // Menu background hover color.
  wp.customize('themename_menu_hover_bgcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu ul li:hover').css({
        'background-color': newval
      });
    });
  });
  // Menu text color.
  wp.customize('themename_menu_txtcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu ul li a').css({
        'color': newval
      });
    });
  });
  // Menu text hover color.
  wp.customize('themename_menu_hover_txtcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu ul li a:hover').css({
        'color': newval
      });
    });
  });
  // Menu active background color.
  wp.customize('themename_menu_current_bgcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu ul li.current_page_item').css({
        'background-color': newval
      });
    });
  });
  // Widget Title Font-awesome
  wp.customize('themename_widget_title_fontawesome', function(value) {
    value.bind(function(newval) {
      var val = "\\" + newval;
      $('<style>.widget .widget-title::before{content:"' + val + '" !important}</style>').appendTo('head');
    });
  });
  // Widget List Font-awesome
  wp.customize('themename_widget_list_fontawesome', function(value) {
    value.bind(function(newval) {
      var val = "\\" + newval;
      $('<style>.widget ul li::before{content:"' + val + '" !important}</style>').appendTo('head');
    });
  });
});
