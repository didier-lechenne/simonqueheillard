<?php 
$headingSize   = $block->headingSize()->isNotEmpty() ? $block->headingSize()->value() : null;
$textAlign     = $block->textAlign()->isNotEmpty() ? $block->textAlign()->value() : null;
$textTransform = $block->textTransform()->isNotEmpty() ? $block->textTransform()->value() : null;
$level         = $block->level()->or('h3')->value();

$classes = [];
if($headingSize) $classes[] = $headingSize;
if($textAlign) $classes[] = $textAlign;
if($textTransform) $classes[] = $textTransform;
$classAttr = !empty($classes) ? ' class="' . implode(' ', $classes) . '"' : '';
?>

<<?= $level ?><?= $classAttr ?>>
  <?= $block->text()->kt() ?>
</<?= $level ?>>