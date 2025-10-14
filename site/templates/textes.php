<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="container">

<section id="textes"> 
  <section class="grid">
    <?php
    $textes = $page->find('textes-critiques')->children()->listed()->sortBy('num', 'asc');;
    $titre_textes = $page->find('textes-critiques')->title()->text();
    $lettres = page('textes')->find('lettres-conversations')->children()->listed();
    $titre_lettres = $page->find('lettres-conversations')->title()->text();
   
    if ($textes->count() > 0): ?>
    <div class="column " style="--columns:6">
     <h3><?= $titre_textes ?></h3>
      <?php foreach ($textes as $texte): ?>
        <div class="textes">
        <!-- <span class="title"><?= $texte->title()->text() ?></span> -->

          <?php if($texte->date()->isNotEmpty()): ?>
            <span class="date"><?= date('Y', strtotime($texte->date())); ?></span>
          <?php endif ?>
          
          <?php if($texte->titre_page()->isNotEmpty()): ?>
            <span class="title"><a class="" href="<?= $texte->url() ?>"> <?= $texte->titre_page()->text() ?> </a></span>
          <?php endif ?>
          <?php if($texte->contexte()->isNotEmpty()): ?>
            <span class="contexte"><?= $texte->contexte()->html() ?></span>
          <?php endif ?>
          <?php if($texte->adresse()->isNotEmpty()): ?>
            <span class="adresse "><?= $texte->adresse()->text() ?></span>
          <?php endif ?>
          </div>
    
      <?php endforeach ?>
    </div>
    <?php endif ?>

    <?php if ($lettres->count() > 0): ?>
    <div class="column" style="--columns:6">
      <h3><?= $titre_lettres ?></h3>
      <?php foreach ($lettres as $lettre): ?>
        <a class="textes" href="<?= $lettre->url() ?>">

          <div class="date">
          <?php if($lettre->date()->isNotEmpty()): ?>
            <?= date('Y', strtotime($lettre->date())); ?>
          <?php endif ?>
          </div>

          <?php if($lettre->titre_page()->isNotEmpty()): ?>
            <div class="title"><?= $lettre->titre_page()->text() ?></div>
          <?php endif ?>

          <?php if($lettre->contexte()->isNotEmpty()): ?>
            <div class="contexte"><?= $lettre->contexte()->html() ?></div>
          <?php endif ?>

          <?php if($lettre->adresse()->isNotEmpty()): ?>
            <div class="adresse "><?= $lettre->adresse()->text() ?></div>
          <?php endif ?>
        </a>
      <?php endforeach ?>
    </div>
    <?php endif ?>

  </section>

</section>
</main>
<?php snippet('footer') ?>
