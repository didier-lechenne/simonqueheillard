<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The livre snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="livres">
  <a href="<?= $livre->url() ?>">
    
      <header class="img" >
        <?php if ($cover = $livre->cover()): ?>
          <img  src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
        <?php endif ?>
      </header>

      <h2 class="livre-excerpt-title"><?= $livre->title()->esc() ?>, <time class="livre-excerpt-date" datetime="<?= $livre->published('c') ?>"><?= $livre->published() ?></time>
</h2>
    
  </a>
</article>
