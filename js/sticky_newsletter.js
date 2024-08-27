(function ($, Drupal, drupalSettings) {
    Drupal.behaviors.stickyNewsletter = {
      attach: function (context, settings) {
        $(once('sticky-newsletter', '.sticky-newsletter', context)).each(function () {
          const displayCount = drupalSettings.stickyNewsletter.displayCount;
          const storageKey = 'stickyNewsletterDisplayed';
          
          let displayed = parseInt(localStorage.getItem(storageKey) || '0');
  
          if (displayed < displayCount) {
            $(this).show();
            displayed++;
            localStorage.setItem(storageKey, displayed.toString());
          } else {
            $(this).hide();
          }
  
          $('.sticky-newsletter-close', this).on('click', function () {
            $('.sticky-newsletter').hide();
          });
        });
      }
    };
  })(jQuery, Drupal, drupalSettings);
  