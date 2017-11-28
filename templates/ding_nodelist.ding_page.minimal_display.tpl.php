<?php

/**
 * @file
 * Minimal display page display template.
 */
$title = $item->title;
$date = date('d/m', $item->created);
?>
<table>
  <tr class="minimal-item <?php print $class; ?>">
    <td class="minimal-title"><?php print l($title, 'node/' . $item->nid); ?></td>
    <td class="minimal-date"><?php print $date; ?></td>
  </tr>
</table>