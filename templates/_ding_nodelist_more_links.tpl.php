<?php

/**
 * @file
 * Template for "More links" block.
 */
?>
<div class="more-links">
  <ul>
    <?php foreach ($links as $key => $bottom) : ?>
      <li>
      <div class="more-link"> <?php print l($bottom['text'], $bottom['links'], array('attributes' => array('class' => 'more-link'))); ?></div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
