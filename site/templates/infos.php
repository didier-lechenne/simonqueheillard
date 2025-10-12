<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="container ">

<?php $slug = $page->title()->slug(); ?>

<div class="grid text <?= $slug ?>">
<div class="column" style="--columns: 9;">
  <div class="tabset">
      <?php 
      $infos = collection('infos');
      $first = true;
      
      foreach ($infos as $info): 
        $slug = $info->title()->slug();
      ?>
        <input type="radio" name="tabset" id="tab-<?= $slug ?>" <?= $first ? 'checked' : '' ?>>
        <label class="h2" for="tab-<?= $slug ?>"><?= $info->title() ?></label>
      <?php $first = false; endforeach ?>



    <div class="tab-panels">

      <?php 
        $index = 1;
        foreach ($infos as $info): 
            $slug = $info->title()->slug();
      ?>
          <section id="tab-<?= $slug ?>" style="" class="tab-panel tab-panel-<?= $index ?>">
              <?php snippet('layouts', ['field' => $info->layout()])  ?>
          </section>
      <?php 
          $index++;
      endforeach 
      ?>
    </div>
  </div>
</div>

<div class="column sticky" style="--columns: 3; font-size: var(--text-md); ">
  <?= site()->contact()->text()->fixTypo(); ?>
</div>
</main>
<?php snippet('footer') ?>
