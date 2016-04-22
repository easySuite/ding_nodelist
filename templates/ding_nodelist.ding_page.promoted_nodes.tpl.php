<?php
/**
 * @file
 * Ding event promoted nodes template.
 */

$title = $item->title;
$image_field = 'field_' . $item->type . '_list_image';
$image_path = _ding_nodelist_get_image_path($item, $conf, $image_field);
$lead = field_get_items('node', $item, 'field_ding_page_lead');
$teaser = field_get_items('node', $item, 'field_ding_page_body');
$condition = ($class[0] == 'first' && $class[1] == 'left' || $class[0] == 'last' && $class[1] == 'right');
?>
<div
  class="ding_nodelist-pn-item<?php print (empty($image_path) ? ' no-bgimage' : ''); ?>"
  <?php if (!empty($image_path)): ?>
    <?php if ($condition): ?>
      style="background: url(<?php print $image_path; ?>);"
    <?php endif; ?>
  <?php endif; ?>
>
  <h3><?php print l($title, 'node/' . $item->nid); ?></h3>
  <div class="item-body">
    <?php
    if (isset($lead[0]['safe_value'])) {
      print strip_tags($lead[0]['safe_value']);
    }
    elseif (isset($teaser[0]['safe_value'])) {
      print strip_tags($teaser[0]['safe_value']);
    }
    else {
      print '';
    }
    ?>
  </div>

  <div class="read-more">
    <?php print l(t('Read more'), 'node/' . $item->nid); ?>
  </div>
</div>
