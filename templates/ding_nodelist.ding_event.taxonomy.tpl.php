<?php
/**
 * @file
 *
 * Template file for taxonomy-like layout.
 */

if ($variables['conf']['sorting'] == 'event_date') {
  // Get the object from the array in the case we are sorting by date.
  $item = array_shift(array_values($item));
}
$title = $item->title;
$teaser = field_get_items('node', $item, 'field_ding_event_body');
$category = field_view_field('node', $item, 'field_ding_event_category', 'default');
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_formated_ding_event_date($item);
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$library = drupal_render($library);

/**
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
?>
<div class="item">
  <?php if (!empty($image)): ?>
    <div class="item-list-image">
      <a href="<?php print url('node/' . $item->nid);?>"><?php
        print $image ? theme(
          'image_style',
          array_merge($image, array('style_name' => $conf['image_style']))
        ) : '';
      ?></a>
    </div>
  <?php endif ?>
  <div class="item-details">
    <h2 class="item-title"><?php print l($title, 'node/' . $item->nid); ?></h2>
    <span class="item-category"><?php print drupal_render($category); ?></span>
    <span class="item-date"><?php print $event_date; ?></span>
    <span class="item-price">
      <?php
      $fee_field = field_get_items('node', $item, 'field_ding_event_price');
      if (is_array($fee_field)) {
        $fee = current($fee_field);
        print '&mdash; ' . $fee['value'] . 'Kr.';
      }
      else {
        print t('Gratis');
      }
      ?>
    </span>
    <span class="item-library"><?php print $library; ?></span>
    <div class="item-body"><?php print !isset($teaser[0]['safe_summary']) || $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary']; ?></div>
  </div>
</div>
