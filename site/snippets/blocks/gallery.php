<?php
/** @var \Kirby\Cms\Block $block */
?>
<figure class="gallery">
  <ul>
    <?php foreach ($block->images()->toFiles() as $image): ?>
    <li>
      <a data-lightbox href="<?= $image->resize(1200)->url() ?>">
        <img
          src="<?= $image->resize(600)->url() ?>"
          srcset="<?= $image->srcset() ?>"
          sizes="(min-width: 1200px) 1200px, (min-width: 900px) 900px, (min-width: 600px) 600px, 100vw"
          alt="<?= esc($image->alt(), 'attr') ?>"
          style="
            aspect-ratio: <?= $block->ratio()->or('auto') ?>;
            object-fit: <?= $block->crop()->isFalse() ? 'contain' : 'cover' ?>
          "
        >
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption>
    <?= $block->caption()->fixTypo() ?>
  </figcaption>
  <?php endif ?>
</figure>