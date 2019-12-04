<?php

/**
 * @file
 * Ding event image and text template.
 */

$event_date = _ding_nodelist_get_event_date($item);
$event_date_formatted = _ding_nodelist_formated_ding_event_date($item);
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
?>
<div class="item">
  <?php if (!empty($item->image)): ?>
    <div class="event-image" style="background-image:url(<?php print $item->image; ?>);"></div>
  <?php endif; ?>
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
        <span class="item-price"><?php print $item->price; ?></span>
      </div>
    </div>
  </div>
</div>
