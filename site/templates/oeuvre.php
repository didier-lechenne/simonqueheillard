<?php 
$layoutWidth = $page->layout_width()->or('narrow')->value();
?>


<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>

<main class="main">
  <article>
    <?php // snippet('intro') ?>
    <div class="grid text <?= $layoutWidth ?>">
      <div class="column" style="--columns: 12">
        <h3><?php echo $page->title()->text() ?></h3>
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