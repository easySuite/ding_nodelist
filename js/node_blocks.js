(function($){
  'use strict';

  // Set height for nodes teasers.
  $(window).bind('resize.node_teaser', function () {
    let ding_event_teaser_height = 0;

    $('.ding_nodelist-items').find('article').each(function () {
      ding_event_teaser_height = $(this).find('.inner').outerHeight();
      $(this).height(ding_event_teaser_height);
    });
  });

  Drupal.behaviors.ding_nodelist_nodeblocks_hover = {
    attach: function (context) {
      let title_and_lead_height,
          hovered,
          $article = $('.ding_nodelist-items', context).find('article');

      $article.mouseenter(function() {
        // Set height for title and lead text.
        title_and_lead_height = $(this).find('.title').outerHeight(true) + $(this).find('.field-name-field-ding-event-lead .field-items').outerHeight(true) + 20;
        $(this).find('.title-and-lead').css('min-height', title_and_lead_height);

        // Set timeout to make shure element is still above while it animates
        // out.
        hovered = $(this);
        setTimeout(function(){
          $('article.node-teaser').removeClass('is-hovered');
          hovered.addClass('is-hovered');
        }, 300);
      });
      $article.mouseleave(function() {
        $(this).find('.title-and-lead').css('min-height', '');
      });
    }
  };
})(jQuery);
