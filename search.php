<?php get_header(); ?>
	
	<div id="content" class="col-sm-12 col-md-8">
		<div id="main" class="row">
			<section class="latest-post col-xs-12 col-md-12">
				<header class="heading">
					<h2><?php _e("Search Results for","lobbybytes"); ?>:<?php echo esc_attr(get_search_query()); ?></h2>
				</header>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header class="panel">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</header>
					<article class="text <?php post_class('clearfix'); ?>" id="post-<?php the_ID(); ?>"  role="article">
	
						
						<header class="panel">
							 <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php _e("Posted", "lobbybytes"); ?>:<?php the_time(); ?></time>
							<span class="title"> <?php the_category(', '); ?></span>
							<strong class="author"><?php _e("By:", "lobbybytes"); ?> <?php the_author_posts_link(); ?></strong>
						</header>
					
						<section class="post_content">
							<?php the_excerpt('<span class="read-more">' . __("Read more on","lobbybytes") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
					
						</section> <!-- end article section -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<div class="pagination">
							<ul>
								<li><?php next_posts_link(_e('&laquo; Older', "lobbybytes")) ?></li>
								<li><?php previous_posts_link(_e('Newer &raquo;', "lobbybytes")) ?></li>
							</ul>
						</div>
					<?php } ?>			
					
					<?php else : ?>
					
					<!-- this area shows up if there are no results -->
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "lobbybytes"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "lobbybytes"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
			</div> <!-- end #content -->
			<?php get_sidebar(); // sidebar 1 ?>

<?php get_footer(); ?>