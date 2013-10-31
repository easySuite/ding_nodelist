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
$image = _ding_nodelist_get_dams_image_info($item, 'field_list_image');
$background_image_style = $image ? ' style="background-image: url(\'' . image_style_url($conf['image_style'], $image['path']) . '\')" title="' . $image['title'] . '"' : '';
?>
<div class="item news va-slice"<?php print $background_image_style; ?>>
  <div class="va-title">
    <div class="event-label"><?php print t('News');?></div>
  </div>
  <div class="va-content" data-destination="<?php print url('node/' . $item->nid);?>">
    <div class="caption">
      <h3>
        <?php print l($item->title, 'node/' . $item->nid);?>
      </h3>
      <div class="category">
      <?php
        $body = field_view_field('node', $item, 'field_editorial_base_n', 'teaser');
        print drupal_render($body);
      ?>
      </div>
    </div>
  </div>
</div>
