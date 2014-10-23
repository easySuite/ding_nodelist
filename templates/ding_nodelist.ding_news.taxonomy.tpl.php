<?php
/**
 * @file
 *
 * Template file for taxonomy-like layout.
 */

$title = $item->title;
$teaser = field_get_items('node', $item, 'field_ding_news_body');
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
if (!empty($item->publish_on)) {
  $date = $item->publish_on;
}
else {
  $date = $item->created;
}
$date = format_date($date, 'custom', 'd/m/Y');
$author = $item->name;

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
  <div class="item-list-image">
    <a href="<?php print url('node/' . $item->nid);?>"><?php print $image ? theme('image_style', array_merge($image, array('style_name' => 'ding_list_large'))) : ''; ?></a>
  </div>
  <div class="item-details">
    <h2 class="item-title"><?php print l($title, 'node/' . $item->nid); ?></h2>
    <span class="item-date"><?php print $date ?></span><span class="item-author"><?php print $author ?></span>
    <div class="item-body"><?php print !isset($teaser[0]['safe_summary']) || $teaser[0]['safe_cummary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary']; ?></div>
  </div>
</div>
