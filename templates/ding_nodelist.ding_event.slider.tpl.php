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
$category = field_view_field('node', $item, 'field_ding_event_category', 'teaser');
$event_date = _ding_nodelist_formated_ding_event_date($item);
?>
<div class="item">
  <span class="date-created">
    <?php print $event_date; ?>
  </span>
  <span class="category">
    <?php print drupal_render($category);?>
  </span>
  <h3><a href="<?php print url('node/' . $item->nid);?>"><?php print $item->title;?></a></h3>
  <div class="node">
    <?php
      $teaser = field_get_items('node', $item, 'field_ding_event_body');
      print !isset($teaser[0]['safe_summary']) || $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary'];
    ?>
  </div>
  <div class="more"><?php print l(t('More'), 'node/' . $item->nid);?></div>
</div>
