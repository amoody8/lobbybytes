<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage lobbybytes
 * @since LB 1.0
 */
get_header(); ?>

<div id="content" class="col-sm-12 col-md-8">
	<div class="row">
	<!-- featured blog post -->
	<section class="latest-post col-md-12">
		<h2><?php the_title(); ?></h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="text" id="post-<?php the_ID(); ?>">
					<!--<div class="image-holder">
						<?php the_post_thumbnail('featured-thumb'); ?>
					</div>-->
					<div class="clearfix"></div>
					<header class="panel">
						<time datetime="<?php the_time('F j, Y'); ?>"><?php the_time('F j, Y'); ?> </time>
						<span class="title"><?php the_category(' '); ?></span>
						<!--<strong class="author"><?php the_field('author'); ?></strong>-->
					</header>
					<?php the_content(); ?>
					<aside  class="tags">
						<?php the_tags('<h4>Tags</h4><ul><li>','</li><li>','</li></ul>'); ?>
					</aside>
				</article>
				<div class="clearfix"></div>
				<?php comments_template(); ?>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				
	</section>
	</div>
</div>
	<?php get_sidebar(); ?>
	</div>
			</div>
		</div>
	
<?php get_footer(); ?>
