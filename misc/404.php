<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage HA
 */
get_header(); ?>
   <div class="row left-sidebar">
	<div class="col-lg-3 col-xs-3 col-md-3 left-sidebar">
		<h1 class="entry-title">404 Page Not Found</h1>
		<?php dynamic_sidebar( 'Press Room' ); ?>
                   <h2>All Pages</h2>
                   <?php wp_page_menu(); ?>

                   <?php the_widget('WP_Widget_Recent_Posts'); ?>

                   <h2><?php _e('Most Used Categories', 'HA'); ?></h2>
                   <ul>
                       <?php wp_list_categories(
                       array(
                           'orderby' => 'count',
                           'order' => 'DESC',
                           'show_count' => 1,
                           'title_li' => '',
                           'number' => 10
                       )
                   ); ?>
                   </ul>
	</div>
	<div class="col-lg-9 col-md-9 col-xs-9 nopad entry-content">
		<div class="breadcrumbs_">
			<?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                    } ?>
		</div>
		<div class="print-email">
			<a class="print" href="javascript:window.print()" target="_blank">Print Page</a> | 
			<a class="email" href="javascript:emailCurrentPage()" target="_blank">Email Page</a>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12 col-md-12 col-xs-12">
		 <header class="page-title">
                <h1><?php _e('This is Embarrassing', 'HA'); ?></h1>
            </header>

            <p class="lead"><?php _e(
                'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.',
                'HA'
            ); ?></p>
           <div class="well">
               <?php get_search_form(); ?>
           </div>
		</div>
	</div>
</div>

<?php get_footer(); ?>