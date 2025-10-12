<?php if ($file = $block->source()->toFile()): ?>
<div class="audio-wrapper">
  <?php if ($poster = $block->poster()->toFile()): ?>
  <figure class="audio-poster">
    <?= $poster->crop(200, 200) ?>
  </figure>
  <?php endif ?>
  <div class="audio-info">
    
    <figure class="audio-block">
    <div class="audio-wrapper" style="width:400px;max-width:100%;">
        <audio preload="auto" controls class="audio-element" >
        <source src="<?= $file->url()?>" type="<?= $file->mime() ?>">
        Your browser does not support the <code>audio</code> element.
        </audio>

    <figcaption class="audio-caption">
    <?php if ($title = $block->title()): ?>
        <div class="bold audio-title">
            <strong><?= $title ?></strong>
        </div>
    <?php endif ?>
    <?php if ($subtitle = $block->subtitle()): ?>
        <div class="audio-subtitle">
            <?= $subtitle ?>
        </div>
    <?php endif ?>
    <?php if ($description = $block->description()): ?>
        <div class="audio-description">
            <?= $description ?>
        </div>
    <?php endif ?>
    </figcaption>
    </div>
    </figure>
  </div>
</div>
<?php endif ?>