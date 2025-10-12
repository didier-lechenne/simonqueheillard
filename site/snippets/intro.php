
<header class="">
  <h3>
  <?= preg_replace('/^<p>(.*)<\/p>$/', '$1', $page->titre_page()->text()->fixTypo()) ?>
  </h3>
</header>
