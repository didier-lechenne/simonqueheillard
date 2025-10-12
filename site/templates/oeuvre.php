<main class="main">
<?php snippet('header') ?>
<article>
  <?php snippet('intro') ?>
  <div class="grid text">
    
    <div class="column" style="--columns: 12">
      <ul class="album-gallery">
      <?php foreach ($page->bloc()->toBlocks() as $block): ?>

        <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
        <?= $block->text()->kt() ?>
        </div>

      <?php endforeach ?>   
      </ul>
    </div>
</article>
</main>
<?php snippet('footer') ?>
