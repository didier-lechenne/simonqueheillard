<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The livre snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="livre-excerpt">
  <a href="<?= $livre->url() ?>">
    <header>
      <figure class="img" >
        <?php if ($cover = $livre->cover()): ?>
          <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
        <?php endif ?>
      </figure>

      <h2 class="livre-excerpt-title"><?= $livre->title()->esc() ?></h2>
      <time class="livre-excerpt-date" datetime="<?= $livre->published('c') ?>"><?= $livre->published() ?></time>
    </header>
    <?php if (($excerpt ?? true) !== false): ?>
  <div class="livre-excerpt-text">
    <?php
    $contentFix = ""; // Initialiser la variable avant de l'utiliser
    $blocks = $livre->text()->toBlocks();
    
    foreach ($blocks as $block) {
      // Si c'est un bloc de colonnes
      if ($block->type() === 'columns') {
        $layout = json_decode($block->content()->layout(), true);
        
        // Parcourir chaque colonne dans le layout
        foreach ($layout as $layoutItem) {
          foreach ($layoutItem['columns'] as $column) {
            // Parcourir chaque bloc dans la colonne
            foreach ($column['blocks'] as $columnBlock) {
              // Si c'est un bloc de texte, ajouter son contenu
              if ($columnBlock['type'] === 'text') {
                $field = new Kirby\Cms\Field($page, 'text', $columnBlock['content']['text']);
               
                $contentFix .= strip_tags($field->text());
              }
            }
          }
        }
      }
      // Pour les blocs de texte directs
      elseif ($block->type() === 'text') {
        $contentFix .= strip_tags($block->text());
      }
      
      // Arrêter si nous avons déjà suffisamment de texte
      if (strlen($contentFix) > 280) {
        break;
      }
    }
    
    // Afficher l'extrait limité à 280 caractères
    echo substr($contentFix, 0, 280) . (strlen($contentFix) > 280 ? ' …' : '');
    ?>
  </div>
<?php endif ?>
  </a>
</article>
