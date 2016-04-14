/**
 * @file
 * Enables the tabs to change automatically and add handler to capture click
 * events on the tabs.
 */
(function ($) {

  $(document).ready(function($) {
    var rolltab = $('.ding_nodelist-rolltab');
    var rolltab_select = $('.ding_nodelist-rolltab-select-tabs');

    // Hack to check if tab have been tab_selected, as unbind event will not work.
    var tab_selected = false;

    // Check if the tabs lib is loaded before trying to call it.
    if ($.fn.tabs) {
      rolltab.tabs({
        select: function(event, ui) {
          // Update the mobile navigation drop down.
          rolltab_select.prop('selectedIndex', ui.index);
        }
      }).tabs("rotate", 5000);

      // Stop tabs rotate when mouse is over the tab roll.
      rolltab.mouseenter(function() {
        rolltab.tabs('rotate', 0);
      });

      // Start tabs rotate when mouse is out.
      rolltab.mouseleave(function() {
        if (!tab_selected) {
          rolltab.tabs().tabs("rotate", 5000);
        }
      });
    }

    // Add click event to select tabs options.
    $('.ui-tabs-nav-item a', rolltab).click(function(e) {
      e.preventDefault();
      rolltab.tabs().tabs('rotate', 0);
      tab_selected = true;
      return false;
    });

    // Hook into click events in the responsive mobile selector.
    rolltab_select.on('change', function() {
      rolltab.tabs("select", $(this).prop('selectedIndex'));
      rolltab.tabs().tabs('rotate', 0);
      tab_selected = true;
    });
  });

})(jQuery);
