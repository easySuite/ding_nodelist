<?php

/**
 * @file
 * Ding event image and text template.
 */
// var_dump($item); die;

$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_get_event_date($item);
$event_date_formatted = _ding_nodelist_formated_ding_event_date($item);
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
$slide_image = l($image ? theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))) : '', 'node/' . $item->nid, array('html' => TRUE));
?>
<div class="item">
  <div class="event-image">
    <?php print $slide_image; ?>
  </div>
  <div class="article-info">
    <div class="label"><?php print drupal_render($category);?></div>
    <div class="node">
    <div class="item-date"><?php print $event_date_formatted; ?></div>
      <h3 class="node-title"><?php print l($item->title, 'node/' . $item->nid); ?></h3>
      <p class="item-details">
        <?php print $item->teaser_lead; ?>
      </p>
      <div class="event-info">
        <span class="library"><?php print $library[0]['#markup']; ?></span>
        <span class="item-price">
          <?php
            $fee_field = field_get_items('node', $item, 'field_ding_event_price');
            if (is_array($fee_field)) {
              $fee = current($fee_field);
              if ($fee['value'] !== '0') {
                print '&mdash; ' . $fee['value'] . ' ' . $currency;
              }
              elseif ($fee['value'] === '0') {
                print '&mdash; ' . t('Free');
              }
            }
          ?>
        </span>
      </div>
    </div>
  </div>
</div>
