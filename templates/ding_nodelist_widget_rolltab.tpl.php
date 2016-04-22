<?php
/**
 * @file
 * Rolltab widget template.
 *
 * This template defines the basic structure for the rolltab widget (with
 * support for responsive design.)
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
      <div class="ding_nodelist-rolltab-wrapper">
        <div id="ding_nodelist-rolltab" class="ding_nodelist-rolltab">
          <ul class="ui-tabs-nav">
            <?php foreach ($items as $i => $result) : ?>
              <li class="ui-tabs-nav-item count-<?php print $i; ?>">
                <a href="#fragment-<?php print $i; ?>">
                  <span>
                    <?php if ($conf['sorting'] == 'event_date') {
                      $r = array_shift($result);
                      print $r->title;
                    } else {
                       print $result->title;
                    } ?>
                  </span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <?php foreach ($items as $id => $row): ?>
            <div id="fragment-<?php print $id; ?>"
                 class="ui-tabs-panel<?php if ($id >= "1") {
                   print " ui-tabs-hide";
                 } ?>">
              <?php print theme($template, array(
                'item' => $row,
                'conf' => $conf,
              )); ?>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Used for responsive -->
        <select class="ding_nodelist-rolltab-select-tabs">
          <?php foreach ($items as $id => $result) : ?>
            <option class="nodelist-tabs-item">
              <?php if ($conf['sorting'] == 'event_date') {
                $r = array_shift($result);
                print $r->title;
              } else {
                print $result->title;
              } ?>
            </option>
          <?php endforeach; ?>
        </select>

      </div>
    </div>
  </div>
<?php endif; ?>
