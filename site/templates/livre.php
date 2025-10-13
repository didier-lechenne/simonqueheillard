
<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>

<main class="main container">
  <article>
    
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
  <section class="grid text livre" id="<?= $layout->id() ?>">
    <?php foreach ($layout->columns() as $column): ?>
    <div class="column" style="--columns:<?= $column->span(12) ?>">
      <div class="blocks">
        <?php foreach ($column->blocks() as $block): ?>
        <div class="block block-type-<?= $block->type() ?>">
          <?php snippet('blocks/' . $block->type(), ['block' => $block, 'layout' => $layout]) ?>
        </div>
        <?php endforeach ?>
      </div>
    </div>
    <?php endforeach ?>
  </section>
  <?php endforeach ?>

  </article>
</main>

<?php snippet('footer') ?>



