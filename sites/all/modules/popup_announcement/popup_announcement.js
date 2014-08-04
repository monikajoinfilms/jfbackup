/**
 * @file
 * Primary JavaScript file for the Pop-up announcement module.
 */

(function ($) {

Drupal.behaviors.popup_announcement = {
  attach: function (context) {
    if (Drupal.settings && Drupal.settings.popup_announcement) {

      // var overlay = $('#popup-announcement-wrap', context);
      // if we have installed colorbox module
      /*overlay.colorbox({
        inline: true,
        width: Drupal.settings.popup_announcement.width + 'px',
        height: Drupal.settings.popup_announcement.height + 'px',
        href: '#popup-announcement',
        opacity: 0.5,
        open: true
      });*/
      // if we HAVE NOT installed colorbox module
      var left = Math.floor(($(window).width() - Drupal.settings.popup_announcement.width) / 2);
      var top = Math.floor(($(window).height() - Drupal.settings.popup_announcement.height) / 2);

      var overlay = $('#popup-announcement-overlay', context);
      var announcement = $('#popup-announcement-wrap', context);
      var close = $('#popup-announcement-close', context);

      overlay.show();
      $('BODY').append(announcement);
      announcement.show().css({
        'width': Drupal.settings.popup_announcement.width,
        'height': Drupal.settings.popup_announcement.height,
        'left': left,
        'top': top
      });

      // close announcement
      close.click(function() {
        overlay.fadeOut();
        announcement.fadeOut();
      });
      overlay.click(function() {
        overlay.fadeOut();
        announcement.fadeOut();
      });
      $(document).keyup(function(e) {
        if (e.keyCode == 27) {
          overlay.fadeOut();
          announcement.fadeOut();
        }
      });

    }
  }
};

})(jQuery);
