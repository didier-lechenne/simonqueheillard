
<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This example template makes use of the `$gallery` variable defined
  in the `album.php` controller (/site/controllers/album.php)

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
Category
<main class="main">
<?php snippet('header') ?>
<article>
  <?php snippet('intro') ?>
  
  <?php if($oeuvres = $page->children()->template('oeuvre')->listed()): ?>
  <section class="oeuvres">
    <!-- <h2>Œuvres dans cette catégorie</h2> -->
    <div class="oeuvres-grid">
      <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre-item">
          <a href="<?= $oeuvre->url() ?>">
            <?php if($coverImage = $oeuvre->cover()->toFile()): ?>
              <img src="<?= $coverImage->url() ?>" 
                   alt="<?= $oeuvre->title() ?>">
            <?php endif ?>
            <h3><?= $oeuvre->title() ?></h3>
          </a>
        </article>
      <?php endforeach ?>
    </div>
  </section>
  <?php endif ?>

</article>
</main>
<?php snippet('footer') ?>
