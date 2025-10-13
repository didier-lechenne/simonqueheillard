<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>

<main class="main container">
  <article>
    <?php snippet('intro') ?>
    <div class="grid text">
      <div class="column" style="--columns: 12">
        
        <?php foreach ($page->bloc()->toBlocks() as $block): ?>
          <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
            <?= $block ?>
          </div>
        <?php endforeach ?>   
        
      </div>
    </div>
  </article>
</main>

<?php snippet('footer') ?>