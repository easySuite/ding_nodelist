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
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
?>
<div class="nb-item item-wrapper <?php print $item->type; ?>">
 <div class="nb-inner">
    <div class="nb-image">
      <?php if (!empty($image)): ?>
        <?php print theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))); ?>
      <?php endif; ?>
    </div>
    <div class="nb-category"><?php print drupal_render($category); ?></div>
    <div class="nb-event-date">
      <?php print t(date('d.m.Y', $event_date)); ?>
    </div>
    <div class="title-and-lead">
      <h3><?php print l($item->title, 'node/' . $item->nid); ?></h3>
      <div class="nb-teaser">
        <?php print $item->teaser_lead; ?>
      </div>
    </div>
    <div class="nb-library"><?php print drupal_render($library); ?></div>
    <div class="nb-event-info">
      <?php print $event_hours; ?>
      <span class="nb-event-fee">
        <?php
        $fee_field = field_get_items('node', $item, 'field_ding_event_price');
        if (is_array($fee_field)) {
          $fee = current($fee_field);
          print $fee['value'] . ' ' . $currency;
        }
        else {
          print t('Free');
        }
        ?>
      </span>
    </div>
    <div class="news-link more-link">
      <?php print l(t('Read more'), 'node/' . $item->nid); ?>
    </div>
  </div>
</div>
