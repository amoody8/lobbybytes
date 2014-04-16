<?php
/**
 * The Template for displaying all single event posts.
 *
 * @package WordPress
 * @subpackage lobbybytes
 * @since LB 1.0
 */
get_header(); ?>

<div id="content" class="col-sm-12 col-md-8">
	<div class="row">
	<!-- featured blog post -->
	<section class="blog-holder col-xs-12 col-md-12">
		<div class="date">
			<time datetime="<?php the_time('F j, Y'); ?>"><?php am_the_startdate($format = 'D', $before = '', $after = '', $echo = true);?><strong><?php am_the_startdate($format = 'd', $before = '', $after = '', $echo = true);?></strong><?php am_the_startdate($format = 'M', $before = '', $after = '', $echo = true);?><span><?php am_the_startdate($format = 'Y', $before = '', $after = '', $echo = true);?></span></time>
		</div>
		<div class="blogs">
		<?php query_posts('post_status=publish,future&post_type=am_event'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="blog-detail col-xs-12 col-md-12 nopad" id="post-<?php the_ID(); ?>">
					<?php if(get_field('event_details')): ?>
					<?php while(has_sub_field('event_details')): ?>
					
					<?php eventimg(); ?>
					<header class="description col-xs-12 col-sm-10 col-md-7">
						<h4><?php the_sub_field('event_name');?></h4>
						<span><?php am_the_venue( $post_id = false ); ?></span>
						<time datetime="<?php the_time('F j, Y'); ?>"><?php am_the_startdate($format = 'D,m d, Y', $before = '', $after = '', $echo = true);?><br><?php am_the_startdate($format = 'g a', $before = '', $after = '-', $echo = true);?><?php am_the_enddate($format = 'g a', $before = '', $after = '', $echo = true); ?></span></time>
						<?php get_template_part('inc/share-meta','lobbybytes'); ?>
					</header>
					<div class="clearfix"></div>
					<div id="post-<?php the_ID() ?>">
						<?php the_sub_field('event_info'); ?>
					</div>
					<div class="break"></div>
					<?php endwhile; ?>
					<?php endif; ?>
			</article>
			<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
		</div>
				<div class="clearfix"></div>
				
	</section>
	</div>
</div>
	<?php get_sidebar(); ?>
	</div>
			</div>
		</div>
	
<?php get_footer(); ?>