<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
        
            <header class="page-header">
            	<div class="page-header-wrap">
                    <h1 class="page-title">Tag Archives:<?php the_title(); ?></h1>
                
                    
                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<div class="breadcrumbs">','</div>');
                    } ?>      
                </div>                           
            </header><!-- .entry-header -->

			<div id="content-sidebar-wrap">
                <div id="content" role="main">
    
					<?php if ( have_posts() ) : ?>
                
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <article id="post-<?php the_ID(); ?>" <?php post_class( $feature_class ); ?>>
                                <div class="post-thumbnail">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('category-thumb');
                                    } 
                                    ?>
                                </div>
                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                            
                                   <!-- <div class="entry-meta">
                                        <?php comments_number( '0', '1', '%' ); ?>
                                    </div>--><!-- .entry-meta -->
                                </header><!-- .entry-header -->
 
                             
                                <footer class="entry-meta">
                                    <div class="category-list"><?php echo get_the_category_list( __( ', ', 'twentyeleven' ) ) ?></div>
                                    <div class="tag-list"><?php echo get_the_tag_list( '', __( ', ', 'twentyeleven' ) ); ?></div>
                            
                                    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
                                    <div style="clear:both"></div>
                                </footer><!-- .entry-meta -->
                           
                                <div class="entry-summary">
                                    <?php the_content(); ?>
                                </div><!-- .entry-content -->
                            </article><!-- #post-<?php the_ID(); ?> -->
                            
                            <?php comments_template( '', true ); ?>
        
                        <?php endwhile; ?>
                
                    <?php else : ?>
        
                        <article id="post-0" class="post no-results not-found">
                                
                            <div class="entry-content">
                                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                                <?php get_search_form(); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-0 -->
        
                    <?php endif; ?>
    
                </div><!-- #content -->
                <div id="sidebar">
					<?php if ( ! dynamic_sidebar( 'Blog Sidebar' ) ) : ?>
        
                        <aside id="archives" class="widget">
                            <h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                            </ul>
                        </aside>
        
                        <aside id="meta" class="widget">
                            <h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
        
                    <?php endif; // end sidebar widget area ?>
                </div><!-- #sidebar -->
                <div style="clear:both"></div>
            </div><!-- #content-sidebar-wrap -->
		</section><!-- #primary -->


<?php get_footer(); ?>
