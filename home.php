<?php
/*
Template Name: Home
*/
get_header(); ?>
<div id="content" class="col-sm-12 col-md-8">
	<!-- featured blog post -->
	<div class="row">
	<section class="featured col-xs-12 col-md-12">
		<div class="hidden-lg hidden-xl">
		<?php dynamic_sidebar( 'Stay With Us Mobile' ); ?>
		</div>
		<h2>Featured</h2>
			<?php query_posts('category_name=featured&posts_per_page=1'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="text col-xs-12 col-md-12 nopad" id="post-<?php the_ID(); ?>">
					<div class="image-holder hidden-xs">
						<?php the_post_thumbnail('featured-thumb'); ?>
					</div>
					<header class="panel">
						<time datetime="<?php the_time('F j, Y'); ?>"><?php the_time('F j, Y'); ?> </time>
						<span class="title"><?php the_category(' '); ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</header>
					<p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>
				</article>
				<div class="clearfix"></div>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
	</section>
	<!-- latest posts  holder-->
	<section class="latest-post col-xs-12 col-md-12">
		<header class="heading">
			<h2>The Latest</h2>
				<a href="<?php the_field('blog_link','option'); ?>" class="more">View the full blog</a>
		</header>
				<?php query_posts('posts_per_page=10'); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="about col-xs-12 col-md-12 nopad" id="post-<?php the_ID(); ?>">
						<?php articleimg(); ?>
					</article>
							
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
				<div class="clearfix"></div>
				<a href="<?php the_field('blog_link','option'); ?>" class="btn">view the full blog</a>
						</section>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	
<?php get_footer(); ?>