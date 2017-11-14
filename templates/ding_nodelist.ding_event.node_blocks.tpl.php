<?php
/**
 * @file
 * Ding event node blocks template.
 */
$category = field_view_field('node', $item, 'field_ding_event_category', 'teaser');
$event_period = field_get_items('node', $item, 'field_ding_event_date');
$event_date = _ding_nodelist_get_event_date($item);
$event_hours = _ding_nodelist_get_event_hours($event_period);
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
$lead = field_get_items('node', $item, 'field_' . $item->type . '_lead');
$teaser = field_get_items('node', $item, 'field_' . $item->type . '_body');
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
?>
<div class="nb-item <?php print $item->type; ?>">
    <div class="nb-inner">
    <div class="nb-event-date">
      <?php print t(date('d. M.', $event_date)); ?>
    </div>
    <h3><?php print l($item->title, 'node/' . $item->nid); ?></h3>
      <?php print theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))); ?>
      <div class="nb-event-summary">
      <?php
      if (isset($lead[0]['safe_value'])) {
        print strip_tags($lead[0]['safe_value']);
      }
      elseif (isset($teaser[0]['safe_value'])) {
        print strip_tags($teaser[0]['safe_value']);
      }
      else {
        print '';
      }
      ?>
    </div>
    <div class="nb-library"><?php print drupal_render($library); ?></div>
    <div class="nb-event-info">
      <?php print $event_hours; ?>
      <span class="nb-event-fee">
      <?php
      $fee_field = field_get_items('node', $item, 'field_ding_event_price');
      if (is_array($fee_field)) {
        $fee = current($fee_field);
        print $fee['value'] . ' ' . t('kr.');
      }
      else {
        print t('Free');
      }
      ?>
    </span>
    </div>

  </div>
</div>
