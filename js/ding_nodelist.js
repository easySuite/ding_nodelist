(function ($) {
    function update($select_element, $target) {
        var count = $('option:selected', $select_element).length;
        if (count > 1) {
            $target.hide();
            $('#edit-list-type input').prop('checked', true);
        }
        else {
            $target.show();
        }
    }

    Drupal.behaviors.nodelist_cts_count = {
        attach: function (context, settings) {
            $('#nodelist_cts', context).once('nodelist_cts_count', function () {

                var $target = $('#edit-nodelist-content');
                var $select_element = $(this);

                // Update once on attach-behaviors.
                update($select_element, $target);

                // Update whenever select element changes.
                $select_element.change(function () {
                    update($select_element, $target);
                });
            });
        }
    };
}(jQuery));
