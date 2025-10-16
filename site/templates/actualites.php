<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="">

<section class="actualites">

  <!-- <h3><?= $page->title()->html() ?></h3> -->

  <?php
  $actualites = $page->children()->listed()->sortBy('date', 'desc');
  if ($actualites->count() > 0): ?>
  <div class="actualite list">
    <?php foreach ($actualites as $actualite): ?>
    
      <a class="card" href="<?= $actualite->url() ?>">

      <div class="date">
      <time>
          <?= $actualite->date()->toDate('Y'); ?>
      </time>

        </time></div>
        <div class="title"><?= $actualite->title()->html() ?></div>
        <div class="category"><?= $actualite->category()->html() ?></div>
        <div class="location"><?= $actualite->location()->html() ?></div>
        <div class="city"><?= $actualite->city()->html() ?></div>

      </a>
    
    <?php endforeach ?>
  </div>
  <?php endif ?>
</section>
</main>
<?php snippet('footer') ?>