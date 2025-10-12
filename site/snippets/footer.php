

  <footer class="footer grid container">
      <div class="column" style="--columns: 12">
        <a href="<?= url($kirby->language()->code() . '/mentions-legales') ?>">Mentions Légales</a>
      </div>
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
