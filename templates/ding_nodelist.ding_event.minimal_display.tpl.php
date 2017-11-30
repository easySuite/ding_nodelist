<?php

/**
 * @file
 * Minimal display event display template.
 */
$title = $item->title;
$event_date = date('d/m', _ding_nodelist_get_event_date($item));
?>
<table>
  <tr class="minimal-item <?php print $class; ?>">
    <td class="minimal-title"><?php print l($title, 'node/' . $item->nid); ?></td>
    <td class="minimal-date"><?php print $event_date; ?></td>
  </tr>
</table>
