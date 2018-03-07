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

$library = field_view_field('node', $item, 'og_group_ref', 'default');
$category = field_view_field('node', $item, 'field_ding_news_category', 'teaser');
$lead = field_view_field('node', $item, 'field_ding_news_lead', array('label' => 'hidden', 'type' => 'text_trimmed', 'settings' => array('trim_length' => 120)));

$news_date = date('d.m.y', $item->created);
if ($item->created < $item->changed) {
  $news_date = date('d.m.y', $item->changed);
}
?>

<article class="node node-ding-event node-promoted node-teaser nb-item <?php print (!empty($image)) ? 'has-image' : ''; ?>">
  <div class="inner">
    <div class="background">
      <div class="button"><?php print l(t('Read more'), 'node/' . $item->nid); ?></div>
    </div>
    <div class="event-text">
      <div class="info-top">
        <?php print drupal_render($category); ?>
      </div>
      <div class="date"><?php print $news_date; ?></div>
      <div class="title-and-lead" style="">
        <h3 class="title"><?php print l($item->title, 'node/' . $item->nid); ?></h3>
        <?php print drupal_render($lead); ?>
      </div>
      <div class="info-bottom">
        <div class="library">
          <?php print drupal_render($library); ?>
        </div>
      </div>
    </div>
  </div>
  <?php if(!empty($image)): ?>
    <div class="event-list-image nb-image" style="background-image:url(<?php print $img_url; ?>);"></div>
  <?php endif; ?>
</article>
