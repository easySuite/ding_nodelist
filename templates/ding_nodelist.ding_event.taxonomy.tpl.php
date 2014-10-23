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
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$event_date = _ding_nodelist_formated_ding_event_date($item);
$author = $item->name;
$library = field_view_field('node', $item, 'og_group_ref', array('label' => 'hidden'));
$library = render($library);

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
    <a href="<?php print url('node/' . $item->nid);?>"><?php
      print $image ? theme(
        'image_style',
        array_merge($image, array('style_name' => $conf['image_style']))
      ) : '';
    ?></a>
  </div>
  <div class="item-details">
    <h2 class="item-title"><?php print l($title, 'node/' . $item->nid); ?></h2>
    <span class="item-date"><?php print $event_date; ?></span>
    <span class="item-author"><?php print $author; ?></span>
    <span class="item-library"><?php print $library; ?></span>
    <div class="item-body"><?php print !isset($teaser[0]['safe_summary']) || $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary']; ?></div>
  </div>
</div>
