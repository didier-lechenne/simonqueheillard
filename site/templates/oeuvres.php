<?php snippet('header') ?>

<div class="container">
  <?php snippet('nav') ?>
</div>


<main class="container oeuvres">

<div class="grid text ">

    <?php foreach (collection('oeuvres') as $oeuvre): ?>
    <article class="column oeuvres" style="--columns: 3">
      <a href="<?= $oeuvre->url() ?>">
        <figure >
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
          
          <figcaption class="img-caption">
            <?= $oeuvre->title()->escape()  ?>
          </figcaption>
        </figure>
      </a>
      </article>
    <?php endforeach ?>

</div>
</main>
<?php snippet('footer') ?>


