<?php
/*
* This is the default page template
*/
get_header(); ?>

<div id="content" class="col-sm-12 col-md-8">
	<section class="featured">
		<header class="heading">
			<h2><?php the_title(); ?></h2>
		</header>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="about col-xs-12 col-md-12" id="post-<?php the_ID(); ?>">
				<?php articleimg(); ?>
				<div class="description">
				<div class="panel">
					<time datetime="<?php the_time('F j, Y');?>"><?php the_time('F j, Y'); ?> </time>
					<span class="title"><!--<?php the_field('description'); ?>--></span>
				</div>
					<p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>
				</div>
			</article>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<div class="clearfix"></div>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
	
<?php get_footer(); ?>