<?php

/**
 * @file
 * Ding page node blocks template.
 */
?>

<article class="node node-ding-event node-promoted node-teaser nb-item <?php print (!empty($item->image)) ? 'has-image' : ''; ?>">
  <div class="inner">
    <div class="background">
      <div class="button"><?php print l(t('Read more'), 'node/' . $item->nid); ?></div>
    </div>
    <div class="event-text">
      <div class="title-and-lead">
        <h3 class="title"><?php print l($item->title, 'node/' . $item->nid); ?></h3>
        <div class="field-name-field-ding-page-lead">
          <div class="field-items">
            <div class="field-item">
              <?php print $item->teaser_lead; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="info-bottom">
        <div class="library">
          <?php print drupal_render($item->library); ?>
        </div>
      </div>
    </div>
  </div>
  <?php if(!empty($image)): ?>
    <div class="event-list-image nb-image" style="background-image:url(<?php print $item->image; ?>);"></div>
  <?php endif; ?>
</article>
