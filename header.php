<!doctype html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<title><?php bloginfo( 'name' );
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	//global $page, $paged, $language;

	//wp_title( '|', true, 'right' );

	

	// Add the blog description for the home/front page.
	//$site_description = get_bloginfo( 'description', 'display' );
	//if ( $site_description && ( is_home() || is_front_page() ) )
		//echo " | $site_description";

	// Add a page number if necessary:
	//if ( $paged >= 2 || $page >= 2 )
		//echo ' | ' . sprintf( __( 'Page %s', 'lobbybytes' ), max( $paged, $page ) );

//
	?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name = "format-detection" content = "telephone=no" />
	<!-- Lobbybytes styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
	<!-- include jQuery library -->
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<!-- include HTML5 IE enabling script and stylesheet for IE -->
	<!--[if IE]>
		<script type="text/javascript" src="/js/ie.js"></script>
	<![endif]-->
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <script>
    	jQuery(document).ready(function(){
    			jQuery('.sidebar-nav').click(function(){
    			jQuery('#sidebar').slideToggle("slow");
    	})
    });
    </script>

</head>
<body>
	<!-- main container of all the page elements -->
	<div>
		<div class="row nm">
			<div class="col-xs-12 col-md-12 col-sm-12 nopad">
				<!-- header of the page -->
				<header id="header">
					<div class="header-top">
						<div class="holder">
							<!-- search from of the page -->
							<?php get_search_form(); ?>
							<!-- logo of the page -->
							<strong class="logo"><a class="homebtn" href="<?php echo site_url(); ?>">Dream Downtown</a></strong>
						</div>
					</div>
					<div class="navbar navbar-default" role="navigation" id="menu">
				<div class="nav-holder">
					<div class="holder">
				<button type="button" class="navbar-toggle sidebar-nav">
							<span class="sidebar">Sidebar</span> <span class="sider purple glyphicon glyphicon-plus"></span>
					</button>
          			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<div class="align">
								MENU
							</div>
							<div class="align2">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</div>
					</button>
					<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img class="img-responsive pull-left" title="<?php bloginfo('name');?>" alt="<?php bloginfo('name');?>" src="<?php echo get_bloginfo('template_directory');?>/images/lobo.png "></a>

					<div class="container collapse navbar-collapse navbar-responsive-collapse" id="nav">
						<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</div>
					
				</div> <!-- end .container -->
			</div> <!-- end .navbar -->
			</div>
							</div>
						</div>
					</div>
				</header>
				<!-- banner of the page -->
				<div class="banner">
					<div class="carousel">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<?php echo do_shortcode('[bxs_slider]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="banner-holder">
					<div class="container">
						<!-- mix cloud placeholder -->
						<div class="mixcloud">
							<?php the_field('mixcloud-header','option'); ?> 
						<a href="#" onClick="window.open('../beta/popup','Mixcloud Player','resizable=no,height=288,width=288,scrollbars=no'); return false;" class="popout hidden-xs">Pop</a>
						</div>
					</div>
					</div>
				</div>
				<!-- contain main informative part of the site -->
				<div class="container">