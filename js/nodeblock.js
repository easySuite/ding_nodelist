(function ($) {
  "use strict";

    Drupal.behaviors.ding_nodeblock = {
      attach: function(context, settings) {
        // Set height for event teasers.
        $('.ding_nodelist-items').bind('resize.ding_nodeblock_teaser', function (evt) {
          var ding_nodeblock_teaser_height = 0;

          $('.nb-item.item-wrapper').each(function (delta, view) {
            ding_nodeblock_teaser_height = $(this).find('.nb-inner').outerHeight();
            if ($(this).find('.nb-image').length > 0) {
              $(this).addClass('has-image');
            }
            $(this).height(ding_nodeblock_teaser_height);
          });
        });

        $('.nb-item.item-wrapper').mouseenter(function () {
          // Set height for title and lead text.
          var title_and_lead_height = $(this).find('.title-and-lead > h3').outerHeight(true) + $(this).find('.nb-teaser span').outerHeight(true);
          $(this).find('.title-and-lead').css('min-height', title_and_lead_height);

          // Set timeout to make shure element is still above while it animates
          // out.
          setTimeout(function(){
          $(this).addClass('is-hovered');
        }, 300);
        }).mouseleave(function () {
          $(this).removeClass('is-hovered');
          $(this).find('.title-and-lead').css('min-height', '');
        });

        // Call resize function when images are loaded.
        $('.ding_nodelist-node_blocks .ding_nodelist-items').imagesLoaded( function() {
          $('.ding_nodelist-items').triggerHandler('resize.ding_nodeblock_teaser');
        });
      }
    };
})(jQuery);
