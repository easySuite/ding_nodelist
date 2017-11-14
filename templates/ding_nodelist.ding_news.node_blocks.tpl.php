<?php
/**
 * @file
 * Ding news node blocks template.
 */
$lead = field_get_items('node', $item, 'field_' . $item->type . '_lead');
$teaser = field_get_items('node', $item, 'field_' . $item->type . '_body');
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$category = field_view_field('node', $item, 'field_ding_news_category', 'teaser');
$news_date = date('d.m.y', $item->created);
if ($item->created < $item->changed) {
  $news_date = date('d.m.y', $item->changed);
}
?>
<div class="nb-item <?php print $item->type; ?>">
  <div class="nb-inner">
    <h3><?php print l($item->title, 'node/' . $item->nid); ?></h3>
    <?php print theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))); ?>
    <?php print drupal_render($category); ?>
      <?php print $news_date; ?>

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
  </div>
</div>
