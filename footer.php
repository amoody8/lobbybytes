</div><!---.Main Content-->
			<footer id="footer">
				<div class="f1">
				<div class="f2">
					<div class="footer-top col-lg-12">
						<div class="holder">
							
							<section class="sitemap col-sm-6 nopad">
								<h5>Site map</h5>
								<!-- footer navigation of the page -->
		<nav class="footer-nav">						
								
 
<?php 
	$max_columns = 4; // change to number of columns you want to add to your footer
	$text_domain = 'lobbybytes'; // the text domain to use for translating the strings
?>
 
<?php foreach ( range(1, $max_columns, 1) as $number ) { ?>	
 
     <?php $sidebar_name = sprintf(__('Footer Column %d', $text_domain), $number ); ?>
 
             <?php dynamic_sidebar( $sidebar_name ); ?>

 
<?php } ?>	

    <div class="clear"></div>				
						</nav>		
							</section>
							<section class="contact col-sm-6 nopad">
								<h5><!--<?php echo the_field('contact'); ?>-->Contact Us</h5>
								<address><!-- <?php echo the_field('address'); ?> <br> <?php echo the_field('city'); ?>,<?php echo the_field('state'); ?> <?php echo the_field('zip'); ?>-->355 W 16th Street<br> NY, New York 10011</address>
								<span><!-- <?php echo the_field('phone'); ?> -->(212) 229-2559</span>
							</section>
						</div>
						</div>
						<div class="footer-bottom col-lg-12">
						<div class="holder">
							<!-- social networking of the page -->
							<ul class="social-networks">
								<li class="facebook"><a href="<?php the_field('facebook','option');?>">Facebook</a></li>
								<li class="twitter"><a href="<?php the_field('twitter','option'); ?>">Twitter</a></li>
								<li class="instagram"><a href="<?php the_field('instagram','option'); ?>">Instagram</a></li>
								<li class="vimeo"><a href="<?php the_field('vimeo','option'); ?>">vimeo</a></li>
								<li class="mixcloud active"><a href="<?php the_field('mixcloud','option'); ?>">mixcloud</a></li>
							</ul>
							<strong class="logo"><a class="homebtn" href="<?php echo site_url(); ?>">Dream Downtown</a></strong>
							<!-- copyright of the page -->
							<div class="copyright">
								<p><?php _e('Content &copy; Copyright', $text_domain); ?> <?php echo date_i18n('Y'); ?> <?php bloginfo('name'); ?><?php _e('Dream Downtown  All rights reserved.', $text_domain); ?><span>Site Design by <a href="http://www.tvidesigns.com/">TVI</a></span></p>
							</div>
						</div>
					</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</div>
    <?php wp_footer(); ?>
	
  </body>
</html>
