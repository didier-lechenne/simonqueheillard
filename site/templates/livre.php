<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This note template renders a blog article. It uses the `$page->cover()`
  method from the `note.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/note.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<main class="main">
<?php snippet('header') ?>
<article>
<?php snippet('intro') ?>

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
<!-- <?php snippet('prevnext') ?> -->
</main>
<?php snippet('footer') ?>



