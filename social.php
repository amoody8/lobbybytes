<?php
/*
** Template Name: Social Feed
*/
get_header(); ?>

<div class="container">
	<!-- featured blog post -->
	<section class="featured">
		<h2><?php the_title(); ?></h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>