
<?php snippet('header') ?>
<article>
  <!-- <?php snippet('intro') ?> -->
  <div class="grid">
    
    <div class="column" style="--columns: 12">

      <ul class="album-gallery">
      <!-- <?php foreach ($page->bloc()->toBlocks() as $block): ?>
        <div id="<?= $block->id() ?>" class="<?= $block->type() ?>">
          <?= $block->collectFootnotes() ?>
        </div>
      <?php endforeach ?> -->

      <?php foreach ($page->bloc()->toBlocks() as $block): ?>
        <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
          <?= $block ?>
        </div>
      <?php endforeach ?>

      </ul>

      <?php  echo Footnotes::footnotes(); ?>

    </div>

</article>
<?php snippet('footer') ?>