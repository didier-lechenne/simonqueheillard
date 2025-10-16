<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="oeuvres">

<div class="grid text ">

    <?php foreach (collection('oeuvres') as $oeuvre): ?>
    <article class="column oeuvres" style="--columns: 3">
      <a href="<?= $oeuvre->url() ?>">
        <div >
            <?php if($coverImage = $oeuvre->cover()->toFile()): ?>
              <img
                class="cover"
                alt="<?= $oeuvre->title()->escape() ?>"
                src="<?= $coverImage->url() ?>"
                srcset="<?= $coverImage->srcset() ?>"
                sizes="(min-width: 1200px) 25vw,
                        (min-width: 900px) 33vw,
                        (min-width: 600px) 50vw,
                        (min-width: 300px) 50vw,
                        100vw"
              >
            <?php else: ?>
              <div class="no-image">Pas d'image</div>
            <?php endif ?>
          
            <h2 >
              <?= html_entity_decode($oeuvre->title()->html()) ?>
              <?php if($oeuvre->date()->isNotEmpty()): ?>
                ,&nbsp;<?= $oeuvre->date()->toDate('Y') ?>
                <?php if($oeuvre->date_fin()->isNotEmpty()): ?>
                  - <?= $oeuvre->date_fin()->toDate('Y') ?>
                <?php endif ?>
              <?php endif ?>
                </h2>
        </div>
      </a>
      </article>
    <?php endforeach ?>

</div>
</main>
<?php snippet('footer') ?>


