<?php
/*
* Template Name: Around Town
*
*/
get_header('around'); ?>

<div id="content" class="col-sm-12 col-md-8">
<div class="row">
	<section class="latest-post col-md-12">
		<header class="heading">
			<h2><?php the_title(); ?></h2>
		</header>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="about col-md-12 nopad" id="post-<?php the_ID(); ?>">
					<?php the_content(); ?>
				
			</article>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<div class="clearfix"></div>
				<div class="pag-prev"><?php previous_posts_link('Prev'); ?></div>
				<div class="pag-next"><?php next_posts_link('Next'); ?></div>
	</section>
</div>
</div>
<?php get_sidebar(); ?>
	</div>
			</div>
		</div>
	
<?php get_footer(); ?>