<?php
/** @var \Kirby\Cms\Block $block */
?>
<figure class="audio-block">
  <?php if($audioFile = $block->audio()->toFile()): ?>
    <div class="audio-wrapper" style="width:400px;max-width:100%;">
    <audio controls preload="auto"  type="<?= $audioFile->mime() ?>" src="<?= $audioFile->url() ?>"></audio>
  <?php endif ?>
  
  <?php if($block->caption()->isNotEmpty()): ?>
  <figcaption class="audio-caption">
    <?= $block->caption() ?>
  </figcaption>
  </div>
  <?php endif ?>
</figure>


