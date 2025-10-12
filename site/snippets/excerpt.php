<article class="blog-article-excerpt">
	<a href="<?= $page->url() ?>">
		<header>
			<figure class="img" style="--w: 16; --h:9">
				<?php if ($cover = $page->cover()): ?>
				<?= $cover->crop(320, 180) ?>
				<?php endif ?>
			</figure>

			<h2 class="blog-article-excerpt-title"><?= $page->title()->escape() ?></h2>
			<time class="blog-article-excerpt-date" datetime="<?= esc($page->dateFormatted('c'), 'attr') ?>"><?= esc($page->dateFormatted()) ?></time>
		</header>
		<?php if (($excerpt ?? true) !== false): ?>
		<div class="blog-article-excerpt-text">
			<?= $page->text()->toBlocks()->excerpt(280) ?>
		</div>
		<?php endif ?>
	</a>
</article>