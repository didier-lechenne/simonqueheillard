<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="">

<section class="talks <?= $page->tile() ?>"> 

  <!-- <h3><?= $page->title()->html() ?></h3> -->

  <?php
  $talks = $page->children()->listed()->sortBy('date', 'desc');
  if ($talks->count() > 0): ?>
  <div class="talk list">
    <?php foreach ($talks as $talk): ?>
    
      <a class="card" href="<?= $talk->url() ?>">
        <div class="date">
        <?= date('Y', strtotime($talk->date())); ?>
        </div>
        <div class="title"><?= $talk->title()->html() ?></div>
        <div class="category"><?= $talk->category()->html() ?></div>
        <div class="location"><?= $talk->location()->html() ?></div>
        <div class="city "><?= $talk->city()->html() ?></div>

      </a>
    
    <?php endforeach ?>
  </div>
  <?php endif ?>
</section>
</main>
<?php snippet('footer') ?>