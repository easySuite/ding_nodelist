(function ($) {
  "use strict";

  $(document).ready(function () {
      // Set height for event teasers.
  $(window).bind('resize.ding_nodeblock_teaser', function (evt) {
    var ding_nodeblock_teaser_height = 0;

    $('.nb-item.item-wrapper').each(function (delta, view) {
      ding_nodeblock_teaser_height = $(this).find('.nb-inner').outerHeight();
      $(this).height(ding_nodeblock_teaser_height);
    });
  });

  // Call resize function when images are loaded.
  Drupal.behaviors.ding_nodeblock_teaser_loaded = {
    attach: function(context, settings) {
      $('.ding_nodelist-node_blocks .ding_nodelist-items').imagesLoaded( function() {
        $(window).triggerHandler('resize.ding_nodeblock_teaser');
      });
    }
  };

    var title_and_lead_height,
      hovered;
    $('.nb-item.item-wrapper').mouseenter(function () {
      // Set height for title and lead text.
      title_and_lead_height = $(this).find('.title-and-lead > h3').outerHeight(true) + $(this).find('.title-and-lead .nb-teaser').outerHeight(true) + 20;
      $(this).find('.title-and-lead').css('min-height', title_and_lead_height);

      // Set timeout to make shure element is still above while it animates
      // out.
      hovered = $(this);
      $('.nb-item.item-wrapper').removeClass('is-hovered');
      hovered.addClass('is-hovered');
    });
    $('.nb-item.item-wrapper').mouseleave(function () {
      $(this).find('.title-and-lead').css('min-height', '');
    });




  });
})(jQuery);
