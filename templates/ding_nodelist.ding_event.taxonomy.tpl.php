<?php

/**
 * @file
 * Template file for taxonomy-like layout.
 *
 * Available variables:
 *
 * $title
 *   Node title.
 * $body
 *   Node body teaser.
 * $image
 *   Node list image html tag.
 * $date
 *   Node date, created or published if set.
 * $author
 *   Node author name.
 */
$title = $item->title;
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_get_event_date($item);
$event_time = _ding_nodelist_get_event_time($item);
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$back_image = l($image ? theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))) : '', 'node/' . $item->nid, array('html' => TRUE));
?>
<div class="item">
  <?php if (!empty($image)): ?>
    <div class="item-list-image">
      <?php print $back_image; ?>
    </div>
  <?php endif ?>
  <div class="label"><?php print drupal_render($category); ?></div>
  <span class="event-list-fulldate">
      <?php print format_date($event_date, 'ding_long_date_only'); ?>
    </span>
  <div class="item-details">
    <h2 class="item-title"><?php print l($title, 'node/' . $item->nid); ?></h2>
    <div class="item-body">
      <span><?php print $item->teaser_lead; ?></span>
    </div>
    <span class="item-library"><?php print $library[0]['#markup']; ?></span>
    <span class="item-price"><?php print $item->price; ?></span>
  </div>
</div>
