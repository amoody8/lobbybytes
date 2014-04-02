<?php
/*
* Template Name: Entertain Me
*
*/
get_header(); ?>

<div id="content" class="col-sm-12 col-md-8">
	<div class="row">
	<section class="latest-post col-xs-12 col-md-12">
		<header class="heading">
			<h2><?php the_title(); ?></h2>
		</header>
		<?php query_posts('category_name=entertain-me&posts_per_page=10'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="about col-xs-12 col-md-12 nopad" id="post-<?php the_ID(); ?>">
				<?php articleimg(); ?>
			</article>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<div class="clearfix"></div>
				<!--<?php blog_pagination(); ?>-->
	</section>
	</div>
</div>
<?php get_sidebar(); ?>
</div></div></div>
<?php get_footer(); ?>