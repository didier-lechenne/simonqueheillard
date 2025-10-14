<?php
$content = $block->text()->orthotypo();
$textAlign = $block->textAlign()->isNotEmpty() ? $block->textAlign() : null;
$textSize = $block->textSize()->isNotEmpty() ? $block->textSize() : null;
$fontFamily = $block->fontFamily()->isNotEmpty() ? $block->fontFamily() : null;

$styleAttributes = [];
if($textSize) {
  $styleAttributes[] = "font-size: var(--" . $textSize . ")";
}
if($fontFamily) {
  $styleAttributes[] = "font-family: var(--" . $fontFamily . ")";
}

$styleString = !empty($styleAttributes) ? ' style="' . implode('; ', $styleAttributes) . ';"' : '';
?>

<div <?= $styleString ?> class="no-text-style block-text<?php if($textAlign): ?> <?= $textAlign ?><?php endif ?>">
  <?= $content->orthotypo() ?>
</div>