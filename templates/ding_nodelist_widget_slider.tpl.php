<?php

/**
 * @file
 * Slider list widget template.
 */
?>
<?php if ($items): ?>
    <div class="<?php print $conf['classes'] ?>">
        <div class="legend">
          <?php if (!empty($conf['title'])): ?>
              <h2 class="pane-title"><?php print $conf['title']; ?></h2>
          <?php endif; ?>
        </div>
      <?php if (!empty($links)): ?>
        <?php print theme('_more_links', ['links' => $links]); ?>
      <?php endif; ?>
        <ul class="ding_nodelist-items">
          <?php
          foreach ($items as $node) {
            print theme($node->item_template, ['item' => $node]);
          }
          ?>
        </ul>
        <div class="next-prev">
            <a class="prev" data-pane-id="<?php print $conf['unique_id']; ?>" href="#"><span>prev</span></a>
            <a class="next" data-pane-id="<?php print $conf['unique_id']; ?>" href="#"><span>next</span></a>
        </div>
    </div>
<?php endif; ?>
