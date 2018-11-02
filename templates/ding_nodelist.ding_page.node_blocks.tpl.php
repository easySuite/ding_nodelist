<?php

/**
 * @file
 * Ding page node blocks template.
 */
?>

<article class="node node-ding-page node-promoted node-teaser nb-item has-image">
  <a href="<?php print '/node/' . $item->nid; ?>">
     <div class="inner">
      <div class="background">
        <div class="button"><?php print t('Read more'); ?></div>
      </div>
      <div class="page-text">
        <div class="title-and-lead">
          <h3 class="title"><?php print $item->title; ?></h3>
          <div class="field-name-field-ding-page-lead">
            <div class="field-items">
              <div class="field-item">
                <?php print $item->teaser_lead; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if(!empty($item->image)): ?>
      <div class="nb-image page-list-image" style="background-image:url(<?php print $item->image; ?>);"></div>
    <?php endif; ?>
  </a>
</article>
