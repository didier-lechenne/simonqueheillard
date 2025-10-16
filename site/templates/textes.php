<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="">

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
        
        <!-- <span class="title"><?= $texte->title()->text() ?></span> -->
        <a class="textes" href="<?= $texte->url() ?>">
          <?php if($texte->date()->isNotEmpty()): ?>
            <span class="date"><?= date('Y', strtotime($texte->date())); ?></span>
          <?php endif ?>
          
          <?php if($texte->title()->isNotEmpty()): ?>
            <span class="title"> <?= $texte->title()->text() ?></span>
          <?php endif ?>
          <?php if($texte->contexte()->isNotEmpty()): ?>
            <span class="contexte"><?= $texte->contexte()->html() ?></span>
          <?php endif ?>
          <?php if($texte->adresse()->isNotEmpty()): ?>
            <span class="adresse "><?= $texte->adresse()->text() ?></span>
          <?php endif ?>
         
     </a>
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

          <?php if($lettre->title()->isNotEmpty()): ?>
            <div class="title"><?= $lettre->title()->text() ?></div>
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
