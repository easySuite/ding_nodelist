<?php
/**
 * @file
 * Ding news slider template.
 */

$category = field_view_field('node', $item, 'field_ding_news_category', 'teaser');
?>
<li class="item">
  <div class="category">
    <?php print drupal_render($category);?>
  </div>
  <h3 class="node-title"><a href="<?php print url('node/' . $item->nid);?>"><?php print $item->title;?></a></h3>
  <div class="node">
    <?php
      $teaser = field_get_items('node', $item, 'field_ding_news_body');
      print $teaser[0]['safe_summary'] == '' ? $teaser[0]['safe_value'] : $teaser[0]['safe_summary'];
    ?>
  </div>
  <div class="more"><?php print l(t('More'), 'node/' . $item->nid);?></div>
</li>
