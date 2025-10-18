<?php
$src = null;
$fullSrc = null;
$srcset = null;

if ($block->location()->value() === 'web') {
    $alt = $block->alt()->or($image->alt());
    $caption = $block->caption()->or($image->caption());
    $link = $block->link()->or($image->link());
    $src = $block->src();
    $fullSrc = $src;
} else if ($image = $block->image()->toFile()) {
    $alt = $block->alt()->or($image->alt());
    $caption = $block->caption()->or($image->caption());
    $link = $block->link()->or($image->link());
    $src = $image->url();
    $fullSrc = $image->resize(1200)->url();
    $srcset = $image->srcset();
}
?>
<?php if ($src): ?>
<figure>
  <a <?= $link->isEmpty() ? 'data-lightbox href="' . $fullSrc . '"' : 'href="' . $link . '"' ?>>
    <picture class="container_img">
    <img
      src="<?= esc($src, 'attr') ?>"
      <?php if ($srcset): ?>
      srcset="<?= $srcset ?>"
      sizes="(min-width: 1200px) 1200px, (min-width: 900px) 900px, (min-width: 600px) 600px, 100vw"
      <?php endif ?>
      alt="<?= esc($alt, 'attr') ?>"

    >
      </picture>
  </a>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption class="figcaption">
    <?= $caption->orthotypo()->kt() ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>