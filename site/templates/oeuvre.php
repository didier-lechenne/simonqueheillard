<?php 
$layoutWidth = $page->layout_width()->or('narrow')->value();
?>


<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>

<main class="main oeuvre">
  <article>
    <?php snippet('layouts', ['field' => $page->bloc()]) ?>
  </article>
</main>





<?php snippet('footer') ?>

