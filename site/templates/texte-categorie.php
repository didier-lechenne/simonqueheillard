<?php
/*
  Template pour l'affichage d'une catégorie de textes
*/
?>
<main class="main">
<?php snippet('header') ?>

<article>
  <?php snippet('intro') ?>
  
  <?php if($textes = $page->children()->template('texte')->listed()->sortBy('date', 'desc')): ?>
  <section class="textes">
    <div class="textes-grid">
      <?php foreach($textes as $texte): ?>
        <article class="texte-item">
          <a href="<?= $texte->url() ?>">
            <?php if($coverImage = $texte->cover()->toFile()): ?>
              <img src="<?= $coverImage->url() ?>" 
                   alt="<?= $texte->title() ?>">
            <?php endif ?>
            <h3><?= $texte->title() ?></h3>
            
            <div class="texte-meta">
              <?php if($texte->date()->isNotEmpty()): ?>
                <time datetime="<?= $texte->date()->toDate('c') ?>">
                  <?= $texte->date()->toDate('d/m/Y') ?>
                </time>
              <?php endif ?>
              
              <?php if($texte->author()->isNotEmpty()): ?>
                <span class="texte-author">Par <?= $texte->author() ?></span>
              <?php endif ?>
            </div>
            
            <?php if($texte->text()->isNotEmpty()): ?>
            <div class="texte-excerpt">
              <?= $texte->text()->toBlocks()->excerpt(150) ?>
            </div>
            <?php endif ?>
          </a>
        </article>
      <?php endforeach ?>
    </div>
  </section>
  <?php endif ?>

</article>
</main>
<?php snippet('footer') ?>