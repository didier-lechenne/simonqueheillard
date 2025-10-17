<?php 
$bgImage = $site->home_cover()->toFile() 
  ? $site->home_cover()->toFile()->url() 
  : 'assets/css/sq001.jpg';

snippet('header-home', ['bgImage' => $bgImage]);
?>

<div class="container">
  <?php snippet('nav') ?>
</div>

<?php snippet('footer') ?>