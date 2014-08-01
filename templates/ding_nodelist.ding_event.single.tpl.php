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
$edbase = field_view_field('node', $item, 'field_editorial_base_e', 'teaser');
$event_date = _ding_nodelist_get_event_date($item);
?>
<div class="item">
  <div class="event-image">
    <a href="<?php print url('node/' . $item->nid);?>"><?php print $image ? theme('image_style', array_merge($image, array('style_name' => $conf['image_style']))) : ''; ?></a>
  </div>
  <div class="event-label"><?php print t('Calendar');?></div>
  <div class="event-date">
    <div class="event-day"><?php print format_date($event_date, 'day_only'); ?></div>
    <div class="event-month"><?php print format_date($event_date, 'short_month_only'); ?></div>
  </div>
  <div class="article-info">
    <div class="category"><?php print drupal_render($edbase);?></div>
    <div class="node">
      <h3><a href="<?php print url('node/' . $item->nid);?>"><?php print $item->title;?></a></h3>
      <p>
        <?php
          $teaser = field_get_items('node', $item, 'field_ding_body');
          print $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary'];
        ?>
      </p>
    </div>
    <div class="more">
      <?php print l(t('More'), 'node/' . $item->nid);?>
    </div>
  </div>
</div>
