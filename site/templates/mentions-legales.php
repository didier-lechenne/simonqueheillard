<main class="main">
<?php snippet('header') ?>
<div class="mentions grid">
  <div class="column text" style="--columns: 7;  font-family: var(--font-family-serif);">
    <h1><?= $page->title()->html() ?></h1>

    <?php if ($page->auteur()->isNotEmpty()): ?>
      <!-- <h2><?= t('Droits d\'auteur', 'Copyright') ?></h2> -->
        <?= $page->auteur()->text()->fixTypo(); ?>
    <?php endif ?>
    

    <?php if ($page->editeur()->isNotEmpty()): ?>
      <h2><?= t('Éditeur', 'Publisher') ?></h2>
        <?= $page->editeur()->text()->fixTypo(); ?>
    <?php endif ?>
    
    <?php if ($page->hebergement()->isNotEmpty()): ?>
      <h2><?= t('Hébergement', 'Hosting') ?></h2>
        <?= $page->hebergement()->text()->fixTypo(); ?>
    <?php endif ?>
    
    <?php /* Utilisation du nom de champ avec tiret comme dans votre contenu */ ?>
    <?php if ($page->{'design_developpement'}()->isNotEmpty()): ?>
      <h2><?= t('Design & développement web', 'Design & Development') ?></h2>
        <?= $page->{'design_developpement'}()->text()->fixTypo(); ?>
    <?php endif ?>
    

    <?php if ($page->{'last_updated'}()->isNotEmpty()): ?>
      <?= t('Dernière mise à jour', 'Last updated') ?>: 
        <?= $page->{'last_updated'}()->toDate('d/m/Y') ?>
    <?php endif ?>
  </div>
</div>
</main>
<?php snippet('footer') ?>
