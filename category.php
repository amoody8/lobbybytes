<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lobbybytes
 * @since LB 1.0
 */

get_header(); ?>
<div id="content" class="col-sm-12 col-md-8">
	<section class="featured">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="about col-xs-12 col-md-12" id="post-<?php the_ID(); ?>">
				<?php articleimg(); ?>
			</article>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				<div class="clearfix"></div>
				<?php blog_pagination(); ?>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer(); ?>