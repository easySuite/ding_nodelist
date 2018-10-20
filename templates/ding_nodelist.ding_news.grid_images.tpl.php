<?php

/**
 * @file
 * Ding news node blocks template.
 */
$image_field = 'field_' . $item->type . '_list_image';
$image = _ding_nodelist_get_dams_image_info($item, $image_field);
$img_url = FALSE;
if (!empty($image['path'])) {
  $img_url = image_style_url($conf['image_style'], $image['path']);
}

$lead = field_view_field('node', $item, 'field_ding_news_lead', [
  'label' => 'hidden',
  'type' => 'text_trimmed',
  'settings' => ['trim_length' => 120],
]);
?>

<div class="grid-images-news-item nodelist-item">
    <a href="<?php print url('node/' . $item->nid); ?>">
        <div class="grid-images-item-image background-image-styling-16-9"
             style="background-image: url(<?php print $img_url; ?>)"></div>
        <div class="grid-images-item-text">
            <h2 class="grid-images-item-title">
              <?php print $item->title; ?>
            </h2>
          <?php print render($lead); ?>
        </div>
    </a>
</div>
