<?php

/**
 * @file
 * Ding event promoted nodes template.
 */

$condition = ($class[0] == 'first' && $class[1] == 'left' || $class[0] == 'last' && $class[1] == 'right');
$classes = array("ding_nodelist-pn-item");
$classes[] = (empty($item->image) ? 'no-bgimage' : NULL);
$classes[] = (isset($item->has_video) ? 'has-video' : NULL);
$classes = implode(" ", $classes);
?>
<div
  class="<?php print $classes; ?> nb-image"
  <?php if (!empty($item->image)): ?>
    <?php if ($condition): ?>
      style="background-image: url(<?php print $item->image; ?>);"
    <?php endif; ?>
  <?php endif; ?>
>
  <?php if (isset($item->has_video)): ?>
    <div class="media-container">
      <div class="media-content"
           data-url="<?php print $item->has_video; ?>"></div>
      <div class="close-media"><i class="icon-cross"></i></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($item->image)): ?>
    <?php if (!$condition): ?>
      <div class="nb-image" style="background-image:url(<?php print $item->image; ?>);"></div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="event-info">
    <h3><?php print l($item->title, 'node/' . $item->nid); ?></h3>
    <div class="item-event-body"><?php print $item->teaser_lead; ?></div>
    <div class="item-date"><?php print drupal_render($item->formated_date); ?></div>
    <div>
      <span class="library"><?php print drupal_render($item->library); ?></span>
      <span class="item-price"><?php print '&mdash; ' . $item->price; ?></span>
    </div>
    <div class="read-more">
      <?php print l(t('Read more'), 'node/' . $item->nid); ?>
    </div>
    <?php if (isset($item->has_video)): ?>
      <div class='media-play'>
        <div class='play round'><i class='icon-play'></i></div>
      </div>
    <?php endif; ?>
  </div>
</div>
