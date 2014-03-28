<?php
/*
* Template Name: Events Template
*
*/
get_header(); ?>
<div id="content" class="col-sm-12 col-md-8">
	<div class="row">
	<section class="blog-holder col-xs-12 col-md-12">
		<div class="date">
		
			<time datetime="<?php the_time('D d M Y');?>"><?php the_sub_field('mon-sun'); ?><strong><?php the_sub_field('day'); ?> </strong><?php the_sub_field('month'); ?><span> <?php the_sub_field('year')?></span></time>
			<a href="#">View</a>
		</div>
		<!-- blog posts of the page -->
		<?php $loop = new WP_Query( array( 'post_type' => 'events', 'posts_per_page' => 10 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php if(get_field('event_details')): ?>
		<div class="blogs">
		<?php while(has_sub_field('event_details')): ?>
			<article class="blog-detail col-xs-12 col-md-12" id="post-<?php the_ID(); ?>">
				<div class="heading">
					<div class="image-holder hidden-xs">
						<?php the_post_thumbnail('article-thumb-sm'); ?>
					</div>
					<header class="description">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
							<span><?php the_sub_field('location'); ?><!--PH-D Lounge--></span>
							<time datetime="<?php the_time('F j, Y'); ?>"><?php the_sub_field('mon-sun'); ?>., <?php the_sub_field('month'); ?>. <?php the_sub_field('day'); ?>, <?php the_sub_field('year')?><br><?php the_sub_field('start_time'); ?> - <?php the_sub_field('end_time'); ?><!--Saturday, February 18, 2013<br> 8pm - 3am --></time>
							<?php get_template_part('inc/share-meta','lobbybytes'); ?>
						</header>
					</div>
					<p><?php get_the_excerpt(); ?></p>
				</article>
				
			</div>
			<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; wp_reset_query(); else: ?>
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

