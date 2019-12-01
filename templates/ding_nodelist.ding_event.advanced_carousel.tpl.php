<?php

/**
 * @file
 *
 * @var $item
 * @var $conf
 */

$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_get_event_date($item);
$event_date_formatted = _ding_nodelist_formated_ding_event_date($item);
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
$slide_image = l(
  $image ? theme('image_style', array_merge($image, ['style_name' => 'nl__culture_carousel'])) : '',
  'node/' . $item->nid,
  [
    'html' => TRUE,
    'attributes' => [
      'class' => 'ac-item-image',
    ],
  ]);
?>

<div class="ac-item">
  <?php print $slide_image; ?>
  <div class="ac-info">
    <?php print render($category); ?>
    <div class="item-date"><?php print date('l d F Y', $event_date); ?></div>
    <h2 class="item-title"><?php print $item->title; ?></h2>
    <div class="item-details"><?php print $item->field_ding_event_lead['und'][0]['value']; ?></div>
    <div class="item-info">
      <div class="library-name"><?php print $library[0]['#markup']; ?></div>
      <div class="date-time"><?php print date('H:i', $event_date); ?></div>
      <?php print render($price); ?>
    </div>
  </div>
</div>

