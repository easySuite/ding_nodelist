<?php

/**
 * @file
 * Carousel list widget template.
 *
 * Variables are:
 * $items - rendered items (HTML)
 * $conf - list configuration with:
 *  - classes - widget-specific CSS classes.
 */
?>
<?php if ($items): ?>
  <?php if (!empty($conf['title'])): ?>
    <h2 class="pane-title"><?php print $conf['title']; ?></h2>
  <?php endif; ?>
  <div class="<?php print $conf['classes'] ?>">
    <div class="ding_nodelist-advanced-carousel">
      <?php
      foreach ($items as $node) {
        print theme($node->item_template, [
          'item' => $node,
          'conf' => $conf,
        ]);
      }
      ?>
    </div>

    <!-- Nav carousel -->
    <div class="slider-nav-wrapper">

      <div class="slider-nav">
        <?php foreach ($items as $item) : ?>
          <div class="ac-nav-item-wrapper">
            <div class="ac-nav-item-image">
              <?php
              $nav_image = $item->field_ding_event_list_image[LANGUAGE_NONE][0];
              $hero_image = [
                'style_name' => 'nl__culture_carousel_thumb',
                'path' => $nav_image['uri'],
                'width' => '80px',
                'height' => '80px',
                'alt' => $nav_image['alt'],
                'title' => $nav_image['title'],
              ];
              print theme('image_style', $hero_image);
              ?>
            </div>
            <div class="ac-nav-item-meta">
              <div class="ac-nav-item-category">
                <?php
                $term = taxonomy_term_load($item->field_ding_event_category[LANGUAGE_NONE][0]['tid']);
                print $term->name; ?>
              </div>
              <div class="ac-nav-item-date">
                <?php
                $event_date = _ding_nodelist_get_event_date($item);
                print date('l d F Y', $event_date); ?>
              </div>
              <div class="ac-nav-item-title">
                <?php print $item->title; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Nav carousel controls. -->
      <div class="carousel-controls">
        <button class="carousel-controls__prev btn" type="button">
          <span> < </span>
        </button>
        <div class="carousel-controls__indicator">
          <span class="indicator--current">01</span> | <span
            class="indicator--total"><?php print '0' . count($items); ?></span>
        </div>
        <button class="carousel-controls__next btn" type="button">
          <span> > </span>
        </button>
      </div>
    </div>

  </div>
<?php endif; ?>
