<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage LobbyBytes
 */
get_header(); ?>
<div id="content" class="col-sm-12 col-md-8">
	<div class="row">
	<section class="featured col-xs-12 col-md-12">
		<header class="heading">
			<h2><?php _e('This is Embarrassing', 'lobbybytes'); ?></h2>
		</header>
			<article class="about col-xs-12 col-md-12 nopad" id="post-<?php the_ID(); ?>">
				<h3><?php _e(
                'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
                'lobbybytes'
            ); ?></h3>
			</article>
			<div class="clearfix"></div>
			<?php blog_pagination(); ?>
	</section>
	</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>