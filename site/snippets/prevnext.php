<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The prevnext snippet renders the nice "keep on reading"
  section below each article in the blog, to jump between
  articles. It reuses the note snippet to render a full
  excerpt of the article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>


<div class="grid">
<div class="column" style="--columns: 8">

<nav class="prevnext">
	
  <?php if ($page->hasNextListed()): ?>
    <a class="prevnext-prev" href="<?= $page->nextListed()->url() ?>">
    <span class="prevnext-label">Previous page</span>
    <span class="prevnext-title link"> 
      ←&thinsp;<?= $page->nextListed()->title()->escape() ?>
      </span>
    </a>
    <?php endif ?>

    <?php if ($page->hasPrevListed()): ?>
    <a class="prevnext-next"  href="<?= $page->prevListed()->url() ?>">
      <span class="prevnext-label">Next page</span>
      <span class="prevnext-title link">
        <?= $page->prevListed()->title()->escape() ?>&thinsp;→
        </span>
    </a>
    <?php endif ?>

	
</nav>
</div>
</div>