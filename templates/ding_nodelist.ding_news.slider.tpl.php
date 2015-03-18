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
$category = field_view_field('node', $item, 'field_ding_news_category', 'teaser');
?>
<li class="item">
  <span class="date-created">
    <?php print format_date($item->created, 'custom', 'd/m/Y'); ?>
  </span> -
  <span class="category">
    <?php print drupal_render($category);?>
  </span>
  <h3><a href="<?php print url('node/' . $item->nid);?>"><?php print $item->title;?></a></h3>
  <div class="node">
    <?php
      $teaser = field_get_items('node', $item, 'field_ding_news_body');
      print $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary'];
    ?>
  </div>
  <div class="more"><?php print l(t('More'), 'node/' . $item->nid);?></div>
</li>
