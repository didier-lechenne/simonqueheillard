<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all the subpages of the `livres` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $livres
  from the `livres.php` controller in `/site/controllers/livres.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="livres">

<!-- <?php if (empty($tag) === false): ?>
<header class="h1">
  <h1>
    <small>Tag:</small> <?= esc($tag) ?>
    <a href="<?= $page->url() ?>" aria-label="Tous les livres">&times;</a>
  </h1>
</header>
<?php endif ?> -->

<ul class="grid <?= $page->title()->slug() ?>">
  <?php foreach ($livres as $livre): ?>
  <li class="column" style="--columns: 3">
      <?php snippet('livre', ['livre' => $livre]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $livres->pagination()]) ?>
</main>
<?php snippet('footer') ?>
