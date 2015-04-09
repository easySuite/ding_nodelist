<?php
/**
 * @file
 * Ding event image and text template.
 * Avaialable fields are:
 * ding_content_tags
 * field_address
 * field_ding_body
 * field_list_image
 * field_main_image
 * field_materials
 * group_audience
 */

if ($variables['conf']['sorting'] == 'event_date') {
  // Get the object from the array in the case we are sorting by date.
  $item = array_shift(array_values($item));
}
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$category = field_view_field('node', $item, 'field_ding_event_category', 'teaser');
$event_date = _ding_nodelist_get_event_date($item);
$event_date_formatted = _ding_nodelist_formated_ding_event_date($item);
$library = field_view_field('node', $item, 'og_group_ref', 'default');
$price = field_view_field('node', $item, 'field_ding_event_price', 'default');
?>
<div class="item">
  <div class="event-image">
    <a href="<?php print url('node/' . $item->nid);?>"><?php print $image ? theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))) : ''; ?></a>
  </div>
  <div class="event-date">
    <div class="event-library"><?php print date('D', $event_date);?></div>
    <div class="event-day"><?php print format_date($event_date, 'day_only'); ?></div>
    <div class="event-month"><?php print format_date($event_date, 'short_month_only'); ?></div>
  </div>
  <div class="article-info">
    <div class="label"><?php print drupal_render($category);?></div>
    <div class="node">
      <h3><a href="<?php print url('node/' . $item->nid);?>"><?php print $item->title;?></a></h3>
      <span class="item-date"><?php print $event_date_formatted; ?></span>
      <span class="item-price">
        <?php
        $fee_field = field_get_items('node', $item, 'field_ding_event_price');
        if (is_array($fee_field)) {
          $fee = current($fee_field);
          print '&mdash; ' . $fee['value'] . 'Kr.';
        }
        else {
          print t('&mdash; Gratis');
        }
        ?>
      </span>
      <span class="library"><?php print drupal_render($library); ?></span>
      <p>
        <?php
          $teaser = field_get_items('node', $item, 'field_ding_event_body');
          print !isset($teaser[0]['safe_summary']) || $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary'];
        ?>
      </p>
      <div class="more">
        <?php print l(t('More'), 'node/' . $item->nid);?>
      </div>
    </div>
    
  </div>
</div>
