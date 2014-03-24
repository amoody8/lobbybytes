<?php 
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 
global $more;
$more = false;
?>

<div class="tribe-events-loop hfeed vcalendar">
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>
		<article class="blog-detail">
		<!-- Month / Year Headers -->
		<header class="description">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
			<span><?php echo tribe_get_venue( $postId = null, $with_link = false ); ?></span>
			<span><?php echo tribe_get_start_date( $event = null, $displayTime = false, $dateFormat = 'l, F j, Y' ); ?></span>
			<time datetime="<?php the_time('F j, Y'); ?>"><?php tribe_event_format_date($date, $displayTime = true,  $dateFormat = '') ?></time>
			<?php get_template_part('inc/share-meta','lobbybytes'); ?>
		</header>
		

		<!-- Event  -->
		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
			<?php tribe_get_template_part( 'list/single', 'event' ) ?>
		</div><!-- .hentry .vevent -->
		</article>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>
	
</div><!-- .tribe-events-loop -->
