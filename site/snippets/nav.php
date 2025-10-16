<header class="header ">
    <?php
    /*
      We use `$site->url()` to create a link back to the homepage
      for the logo and `$site->title()` as a temporary logo. You
      probably want to replace this with an SVG.
    */
    ?>
    <a class="logo" href="<?= $site->url() ?>">
      <?= $site->title()->esc() ?>
    </a>

    <button aria-expanded="false" aria-controls="nav" aria-labelledby="nav-label" id="burger" class="">
      <!-- <span id="nav-label" class="visually-hidden">Menu</span> -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" aria-hidden="true" focusable="false">
        <g class="burger-bars" style="stroke-width:2px; stroke:black;">
          <path d="M4 6L20 6"></path>
          <path d="M4 12L20 12"></path>
          <path d="M4 18L20 18"></path>
        </g>
        <g class="burger-close" style="stroke-width:2px; stroke:black;">
          <path d="M4 20L20 4"></path>
          <path d="M4 4L20 20"></path>
        </g>
      </svg>
    </button>

    <nav id="nav" class="menu">
      <?php
      /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
      ?>
      <?php foreach ($site->children()->listed() as $item): ?>
      <a <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
      <?php endforeach ?>
      <!-- <?php snippet('social') ?> -->
    </nav>
  </header>