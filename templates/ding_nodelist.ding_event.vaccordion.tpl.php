<?php
/**
 * @file
 * Ding event image and text template.
 * Avaialable fields are:
 * ding_content_tags
 * field_address
 * field_ding_body
 * field_list_image
 * field_main_image
 * field_materials
 * group_audience
 */

if ($variables['conf']['sorting'] == 'event_date') {
  // Get the object from the array in the case we are sorting by date.
  $item = array_shift(array_values($item));
}
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_get_event_date($item);
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
$background_image_style = $image ? ' style="background-image: url(\'' . image_style_url($conf['image_style'], $image['path']) . '\')" title="' . $image['title'] . '"' : '';
?>
<div class="item event va-slice"<?php print $background_image_style; ?>>
  <div class="va-title">
    <div class="event-date">
      <div class="event-library"><?php print drupal_render($library);?></div>
      <div class="event-day"><?php print format_date($event_date, 'day_only'); ?></div>
      <div class="event-month"><?php print format_date($event_date, 'short_month_only'); ?></div>
    </div>
  </div>
  <div class="va-content" data-destination="<?php print url('node/' . $item->nid) ?>">
    <div class="inner-wrapper">
      <div class="caption">
        <h3>
          <?php print l($item->title, 'node/' . $item->nid);?>
        </h3>
      </div>
      <div class="library">
        <div class="event-time">
          <span><?php print t('Time');?></span>
          <span><?php print format_date($event_date, 'custom', 'H:i'); ?></span>
        </div>
        <?php
          print drupal_render($library);
        ?>
        <div class="event-fee">
          <?php
            $fee_field = field_get_items('node', $item, 'field_ding_event_price');
            if (is_array($fee_field)) {
              $fee = current($fee_field);
              print '&mdash; ' . $fee['value'] . 'Kr.';
            }
            else {
              print t('&mdash; Gratis');
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
