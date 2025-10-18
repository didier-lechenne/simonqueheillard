<?php 
$layoutWidth = $page->layout_width()->or('narrow')->value();
?>


<?php foreach ($field->toLayouts() as $layout): ?>
<section class="grid text <?= $layoutWidth ?>" id="<?= esc($layout->id(), 'attr') ?>" >
  <?php foreach ($layout->columns() as $column): ?>
  <div class="column" style="--columns:<?= esc($column->span(), 'css') ?>">
    <div class="text">
      <?= $column->blocks() ?>
    </div>
  </div>
  <?php endforeach ?>
</section>
<?php endforeach ?>
