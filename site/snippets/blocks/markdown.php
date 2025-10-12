<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$textAlign = $block->textAlign()->isNotEmpty() ? $block->textAlign() : null;
$textSize = $block->textSize()->isNotEmpty() ? $block->textSize() : null;
$fontFamily = $block->fontFamily()->isNotEmpty() ? $block->fontFamily() : null; // Ajout de cette ligne

$styleAttributes = [];
if($textSize) {
  $styleAttributes[] = "font-size: var(--" . $textSize . ")";
}
if($fontFamily) {
  $styleAttributes[] = "font-family: var(--" . $fontFamily . ")";
}

$styleString = !empty($styleAttributes) ? ' style="' . implode('; ', $styleAttributes) . ';"' : '';
?>

<div <?= $styleString ?> class="block block-type-markdown<?php if($textAlign): ?> <?= $textAlign ?><?php endif ?>">
    <?= $block->text()->kt()->collectFootnotes() ?>
</div>


