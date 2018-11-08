(function($){
  'use strict';

  // Set height for nodes teasers.
  $(window).bind('resize.node_teaser', function () {
    var teaser_height = 0;

    $('.ding_nodelist-items').find('article').each(function () {
      teaser_height = $(this).find('.inner').outerHeight();
      $(this).height(teaser_height);
    });
  });
  // Call resize function when images are loaded.
  Drupal.behaviors.ding_nodelist_nodeblocks_loaded = {
    attach: function(context, settings) {
      if ($.isFunction($.fn.imagesLoaded)) {
        $('.view-ding-event .view-elements').imagesLoaded( function() {
          $(window).triggerHandler('resize.node_teaser');
        });
      }
    }
  };

  Drupal.behaviors.ding_nodelist_nodeblocks_hover = {
    attach: function (context) {
      var title_and_lead_height,
          hovered,
          $article = $('.ding_nodelist-items', context).find('article');

      $article.mouseenter(function() {
        // Set height for title and lead text.
        title_and_lead_height = $(this).find('.title').outerHeight(true) + $(this).find('.field-type-text-long .field-items').outerHeight(true) + 20;
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

  // Adjust height for items with different CR in row.
  Drupal.behaviors.ding_nodelist_nodeblocks_build = {
    attach:function (context, settings) {
      // Adjust height for mixed CTs blocks with/without image.
      var panes = settings.ding_nodelist;
      for (var pane in panes) {
        if (panes.hasOwnProperty(pane)) {
          var $articles = $('.ding_nodelist-node_blocks.' + pane, context).find('article');
          if ($articles.length > 0) {
            var id = 0,
                row = $articles.siblings('[data-row="' + id + '"]');
            do {
              row = $articles.siblings('[data-row="' + id + '"]');

              var height = $(row).first().outerHeight();
              $.each($(row), function (index, article) {
                var row_height = $(article).outerHeight();
                if (height < row_height) {
                  height = row_height;
                }
              });

              $.each($(row), function (index, article) {
                if ($(article).outerHeight() < height) {
                  $(article).find('.text').css('padding-bottom', height - $(article).outerHeight());
                  $(article).height(height);
                }
              });

              id++;
            } while ($(row).length > 0);
          }
        }
      }
    }
  };
})(jQuery);
