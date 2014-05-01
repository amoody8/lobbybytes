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
							<!--<strong class="logo"><a class="homebtn" href="<?php echo site_url(); ?>">Dream Downtown</a></strong>-->
							<?php get_template_part('inc/follow-top','lobbybytes'); ?>
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
					<a class="lobo" title="<?php echo get_bloginfo('name'); ?>" href="<?php echo home_url(); ?>">
						<h1 class="lobby">Lobbybytes</h1>
					</a>

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
									<!--<?php echo do_shortcode('[google-map-v3 shortcodeid="251f50a277" width="100%" height="391" zoom="12" maptype="roadmap" mapalign="center" directionhint="false" language="default" poweredby="false" styles="WyB7ICJmZWF0dXJlVHlwZSI6ICJ3YXRlciIsICJlbGVtZW50VHlwZSI6ICJnZW9tZXRyeSIsICJzdHlsZXJzIjogWyB7ICJodWUiOiAiIzc3MDBmZiIgfSwgeyAic2F0dXJhdGlvbiI6IC00OCB9LCB7ICJsaWdodG5lc3MiOiAtMjggfSwgeyAiZ2FtbWEiOiAxLjY2IH0gXSB9LHsgImZlYXR1cmVUeXBlIjogInJvYWQuaGlnaHdheSIsICJzdHlsZXJzIjogWyB7ICJodWUiOiAiI2ZmMTEwMCIgfSwgeyAic2F0dXJhdGlvbiI6IC00OSB9LCB7ICJsaWdodG5lc3MiOiAtMTkgfSwgeyAiZ2FtbWEiOiAxLjUgfSBdIH0seyAiZmVhdHVyZVR5cGUiOiAibGFuZHNjYXBlLm1hbl9tYWRlIiwgImVsZW1lbnRUeXBlIjogImdlb21ldHJ5LmZpbGwiLCAic3R5bGVycyI6IFsgeyAiY29sb3IiOiAiI2U0ZDdkZCIgfSBdIH0seyAiZmVhdHVyZVR5cGUiOiAicm9hZC5sb2NhbCIsICJlbGVtZW50VHlwZSI6ICJnZW9tZXRyeS5zdHJva2UiLCAic3R5bGVycyI6IFsgeyAid2VpZ2h0IjogMC41IH0sIHsgImNvbG9yIjogIiM4MjgwODAiIH0gXSB9LHsgImVsZW1lbnRUeXBlIjogImxhYmVscy5pY29uIiwgInN0eWxlcnMiOiBbIHsgImh1ZSI6ICIjYjMwMGZmIiB9IF0gfSBd" maptypecontrol="false" pancontrol="true" zoomcontrol="true" scalecontrol="true" streetviewcontrol="false" scrollwheelcontrol="true" draggable="true" tiltfourtyfive="false" enablegeolocationmarker="true" enablemarkerclustering="true" addmarkermashup="false" addmarkermashupbubble="false" addmarkerlist="355 W 16th St, New York, NY 10011{}2-default.png{}PH-D Rooftop Lounge 355 W 16th St New York, NY 10011 (212) 229-2511 phdlounge.com Bar$$$$ Today 5:00 pm – 4:00 am" bubbleautopan="true" distanceunits="miles" showbike="false" showtraffic="false" showpanoramio="false"]'); ?>
									-->
									<?php the_map(); ?>
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