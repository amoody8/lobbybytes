<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage LB
 */
get_header(); ?>
<div id="content" class="col-sm-12 col-md-8">
	<section class="featured">
		<header class="heading">
			<h1><?php _e('This is Embarrassing', 'lobbybytes'); ?></h1>
		</header>
			<article class="about col-xs-12 col-md-12">
				<?php articleimg(); ?>
				<p class="lead"><?php _e(
                'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.',
                'lobbybytes'
            ); ?></p>
			</article>
				<div class="clearfix"></div>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
</div>

<?php get_footer(); ?>