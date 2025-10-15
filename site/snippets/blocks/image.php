<?php
$src = null;
$fullSrc = null;
$srcset = null;

if ($block->location()->value() === 'web') {
    $alt = $block->alt();
    $src = $block->src();
    $fullSrc = $src;
} else if ($image = $block->image()->toFile()) {
    // Tout vient du fichier maintenant
    $alt = $image->alt();
    $caption = $image->caption();
    $link = $image->link();
    $src = $image->resize(600)->url();
    $fullSrc = $image->resize(1200)->url();
    $srcset = $image->srcset();
}
?>
<?php if ($src): ?>
<figure>
  <a <?= $link->isEmpty() ? 'data-lightbox href="' . $fullSrc . '"' : 'href="' . $link . '"' ?>>
    <img
      src="<?= esc($src, 'attr') ?>"
      <?php if ($srcset): ?>
      srcset="<?= $srcset ?>"
      sizes="(min-width: 1200px) 1200px, (min-width: 900px) 900px, (min-width: 600px) 600px, 100vw"
      <?php endif ?>
      alt="<?= esc($alt, 'attr') ?>"
      style="
        aspect-ratio: <?= $block->ratio()->or('auto') ?>;
        object-fit: <?= $block->crop()->isFalse() ? 'contain' : 'cover' ?>
      "
    >
  </a>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption class="img-caption">
    <?= $caption->orthotypo()->kt() ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>