<?php
$src = null;
$fullSrc = null;
$srcset = null;

if ($block->location()->value() === 'web') {
    $alt = $block->alt();
    $src = $block->src();
    $fullSrc = $src;
} else if ($image = $block->image()->toFile()) {
    $alt = $block->alt()->or($image->alt());
    $src = $image->resize(600)->url();
    $fullSrc = $image->resize(1200)->url();
    $srcset = $image->srcset();
}
?>
<?php if ($src): ?>
<figure>
  <a <?= $block->link()->isEmpty() ? 'data-lightbox href="' . $fullSrc . '"' : 'href="' . $block->link() . '"' ?>>
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

  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption class="img-caption">
    <?= $block->caption()->fixTypo() ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>