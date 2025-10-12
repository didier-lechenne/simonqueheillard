<?php 
  // Déterminer la collection basée sur la catégorie
  $collectionName = $page->category() === 'lettres-conversations' 
    ? 'lettres-conversations' 
    : 'textes-critiques';

  // Récupérer la collection correspondante
  $textes = collection($collectionName);

  // Convertir la collection en tableau indexé
  $textesArray = $textes->values();

  // Trouver l'index du texte actuel en utilisant une comparaison de titre
  $currentIndex = false;
  foreach ($textesArray as $index => $texte) {
    if ($texte->title() === $page->title()) {
      $currentIndex = $index;
      break;
    }
  }

  // Initialiser les variables de navigation
  $prevTexte = null;
  $nextTexte = null;

  // Déterminer les textes précédent et suivant
  if ($currentIndex !== false) {
    $prevTexte = $currentIndex > 0 ? $textesArray[$currentIndex - 1] : null;
    $nextTexte = $currentIndex < count($textesArray) - 1 ? $textesArray[$currentIndex + 1] : null;
  }
  ?>
<nav class="prevnext">
	<div class="autogrid" style="--gutter: 1.5rem;">
  <?php if ($prevTexte): ?>
    <a href="<?= $prevTexte->url() ?>">←&thinsp;<?= $prevTexte->title()->escape() ?></a>
  <?php endif ?>

    <?php if ($nextTexte): ?>
    <a href="<?= $nextTexte->url() ?>"><?= $nextTexte->title()->escape() ?>&thinsp;→</a>
    <?php endif ?>

	</div>
</nav>