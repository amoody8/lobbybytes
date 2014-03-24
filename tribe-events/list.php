<?php
/*
* Template Name: Events List
*
*/
get_header(); ?>
<?php get_sidebar(); ?>

		<!-- blog posts of the page -->
		<?php do_action( 'tribe_events_before_template' ); ?>
		<!-- Main Events Content -->
		<?php tribe_get_template_part( 'list/content' ); ?>
		<div class="tribe-clear"></div>
		<?php do_action( 'tribe_events_after_template' ) ?>
<?php get_footer(); ?>