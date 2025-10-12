<?php
use Kirby\Cms\Html;

/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();


// Initialiser les variables
$url = null;
$attrs = [];

// Déterminer l'URL et les attributs selon la source de la vidéo
if ($block->location() == 'kirby' && $video = $block->video()->toFile()) {
    // Vidéo depuis Kirby
    $url = $video->url();
    $attrs = array_filter([
        'autoplay'    => $block->autoplay()->toBool(),
        'controls'    => $block->controls()->toBool(),
        'loop'        => $block->loop()->toBool(),
        'muted'       => $block->muted()->toBool() || $block->autoplay()->toBool(),
        'playsinline' => $block->autoplay()->toBool(),
        'poster'      => $block->poster()->toFile()?->url(),
        'preload'     => $block->preload()->value(),
    ]);
} else if ($block->url()->isNotEmpty()) {
    // Vidéo depuis URL externe
    $url = $block->url()->value();
}

// Vérifier si nous avons une URL valide
if (!empty($url)) {
    // Générer le HTML de la vidéo avec les attributs
    $videoHtml = Html::video($url, [], $attrs);
    
    // Si nous avons du HTML valide, afficher la figure
    if (!empty($videoHtml)): ?>
    <figure>
      <?= $videoHtml ?>
      <?php if ($caption->isNotEmpty()): ?>
      <figcaption><?= $caption ?></figcaption>
      <?php endif ?>
    </figure>
    <?php endif;
} else {
    // Message d'erreur si aucune URL n'est trouvée
    if (kirby()->option('debug')): ?>
    <div class="notice">
        <p>Le bloc vidéo ne contient pas d'URL valide.</p>
    </div>
    <?php endif;
}
?>