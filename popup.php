<?php 
/*
** Template Name: Mixcloud Popup
*/
 ?>
 <html style="margin:0;padding:0;">
 <head>
 	<title>Mixcloud Popout Player</title>
 </head>
 <body style="margin:0;padding:0;background:#000">
 <style>
 		.center {
 		 	margin: auto;
  			position: absolute;
  			top: 0; left: 0; bottom: 0; right: 0;
  			width:285px;
  			height:285px;
		}
	</style>
 <div class="center">
<?php the_field('mixcloud-popup','option'); ?>
</div>

</body>
</html>