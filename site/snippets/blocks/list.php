<?php
$type = $block->type() === 'bullet' ? 'ul' : 'ol';
?>
<<?= $type ?> class="block-list">
  <?php foreach ($block->items()->toArray() as $item): ?>
  <li><?= kirbytext($item) ?></li>
  <?php endforeach ?>
</<?= $type ?>>