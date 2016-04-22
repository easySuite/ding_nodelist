<?php
/**
 * @file
 * Promoted nodes list widget template.
 *
 * Variables are:
 * $items - node items (objects)
 * $conf - list configuration with:
 *  - classes - widget-specific CSS classes
 *  - title - list title
 * $links - list of links (array)
 */
?>
<?php if ($items): ?>
  <div class="<?php print $conf['classes'] ?>">
    <?php if (!empty($conf['title'])): ?>
      <h2 class="ding_nodelist-title"><?php print $conf['title']; ?></h2>
    <?php endif; ?>
    <div class="ding_nodelist-items">
      <div class="ding_nodelist-pn-items">
        <?php
        $chuncked = array_chunk($items, 2);
        foreach ($chuncked as $k => $chunck): ?>
          <?php $row_classes = ($k % 2 == 0 ? 'first' : 'last'); ?>
          <div class="<?php print $row_classes ?>-row">
            <?php foreach ($chunck as $key => $item): ?>
              <?php $block_classes = ($key % 2 == 0 ? 'left' : 'right'); ?>
              <div
                class="<?php print $row_classes . '-' . $block_classes; ?>-block">
                <?php print theme($template, array(
                  'item' => $item,
                  'conf' => $conf,
                  'class' => array($row_classes, $block_classes),
                )); ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
