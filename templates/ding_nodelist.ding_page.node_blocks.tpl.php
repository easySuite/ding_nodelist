<?php

/**
 * @file
 * Ding page node blocks template.
 */
 $image_field = 'field_' . $item->type . '_list_image';
 $image = _ding_nodelist_get_dams_image_info($item, $image_field);
?>
<div class="nb-item item-wrapper <?php print $item->type; ?>">
  <?php if (!empty($image)): ?>
    <?php print theme('image_style', array_merge($image, array('style_name' => $conf['image_style'], 'attributes' => array('class' => 'nb-image')))); ?>
  <?php endif; ?>
 <div class="nb-inner">
    <div class="title-and-lead">
      <h3><?php print l($item->title, 'node/' . $item->nid); ?></h3>
      <div class="nb-teaser">
        <?php print $item->teaser_lead; ?>
      </div>
    </div>
  </div>
</div>
