<?php 
//Register Menu
add_theme_support( 'menus' );

register_nav_menu ( 'primary', __( 'Primary') );
register_nav_menu ( 'head-nav', __( 'The Main Menu') );
register_nav_menu ( 'foot-nav', __( 'Footer Navigation') );

require_once('inc/template-tags.php' );

//Register Sidebars
	register_sidebar(array(
  		'name' => __( 'Default' ),
  		'id' => 'default',
  		'description' => __( 'Widgets in this area will be shown on the Home page in the right column' ),
	));
//Register Sidebars
	register_sidebar(array(
  		'name' => __( 'Stay With Us Mobile' ),
  		'id' => 'stay-mobile',
  		'description' => __( 'Widgets in this area will be shown on the Home page in the right column' ),
	));
	
//Register Google CDN jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('otw_datepicker_js');
   wp_deregister_script('otw_select_js');
   wp_deregister_script('otw_dropdown_js');
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
   wp_register_script('jquery-migrate', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-migrate-1.2.1.js", false, null);
   wp_enqueue_script('jquery');
   wp_enqueue_script('jquery-migrate');
}
function am_scripts_with_jquery()
{
// Register Scripts
	wp_register_script( 'custom-script', get_template_directory_uri() . '/js/jquery.main.js', array( 'jquery' ) );
	wp_register_script( 'sticky-nav', get_template_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ) );
	wp_register_script( 'bootstrap-min', get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ) );
	wp_register_script( 'dropdown-script', get_template_directory_uri() . '/bootstrap/js/hover-dropdown.min.js', array( 'jquery' ) );
	wp_register_script( 'collapse-script', get_template_directory_uri() . '/bootstrap/js/collapse.js', array( 'jquery' ) );
// Enqueue Scripts
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_script( 'sticky-nav' );
	wp_enqueue_script( 'bootstrap-min' );
	wp_enqueue_script( 'dropdown-script' );
	wp_enqueue_script( 'collapse-script' );
}
add_action( 'wp_enqueue_scripts', 'am_scripts_with_jquery' );

	function stickynav(){  
  		print '
  			<script type="text/javascript" charset="utf-8">
  				jQuery(document).ready(function(){
    			jQuery("#menu").sticky({topSpacing:0});
  			});
			</script>'; 
 	} 
	add_action('wp_footer', 'stickynav');  

if (!function_exists('am_lobbybytes_posted_on')) :
    function am_lobbybytes_posted_on()
    {
        printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>','lobbybytes'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'lob'), get_the_author())),
            esc_html(get_the_author())
        );
    }
endif;

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true ); // default Post Thumbnail dimensions (cropped)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)
add_image_size( 'featured-thumb', 598, 270 ); 
add_image_size( 'article-thumb', 295, 185, true); 
add_image_size( 'article-thumb-sm', 145, 166, true); 
// additional image sizes
// delete the next line if you do not need additional image sizes
//
}

//Multicolumn Sitemap widget


function am_register_sidebars() {
 
	$max_columns = 4; // change to number of columns you want to add to your footer
	$text_domain = 'lobbybytes'; // the text domain to use for translating the strings
 
	foreach ( range(1, $max_columns) as $number ) {
		$sidebar_name = sprintf(__('Footer Column %d', $text_domain), $number );		
		register_sidebar( array(
			'name' 		=> $sidebar_name,
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="widget nopad col-xs-3 col-sm-3 %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h2 class="widgettitle">',
			'after_title'	=> '</h2>',
		) );
	}		
}
add_action( 'wp_loaded', 'am_register_sidebars' );

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

if ( ! function_exists( 'blog_pagination' ) ) :
function blog_pagination() {
if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";
		
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
endif;

//====================//
//*****  WIDGETS *****//
//====================//

//Shop widget
class shop_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function shop_widget() {
        parent::WP_Widget(false, $name = 'Shop Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<?php echo do_shortcode('[shop]') ?>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class shop_widget
add_action('widgets_init', create_function('', 'return register_widget("shop_widget");'));

//Instagram widget
class instagram_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function instagram_widget() {
        parent::WP_Widget(false, $name = 'Instagram Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        $url		= 'http://instagram.com/dreamdowntown';
        $link		= '<strong class="username"><a href="'.$url.'">#DREAMDOWNTOWN</a></strong>';
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $link . $after_title; ?>
							<?php echo do_shortcode('[instagram]') ?>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class instagram_widget
add_action('widgets_init', create_function('', 'return register_widget("instagram_widget");'));

//Stay widget
//class stay_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above 
    function stay_widget() {
        parent::WP_Widget(false, $name = 'Stay With Us Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this 
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        $stay_link	= get_field('stay_link','option');
        $logo		= '<strong class="logo"><a class="homebtn" href='. $stay_link .'>Dream Downtown</a></strong>';
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $logo . $after_title; ?>
							<?php echo do_shortcode('[stay]') ?>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this 
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this 
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class stay_widget
add_action('widgets_init', create_function('', 'return register_widget("stay_widget");')); */

//Stay With Us Button widget
class stay_btn_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function stay_btn_widget() {
        parent::WP_Widget(false, $name = 'Stay With Us Button Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        $stay_link	= get_field('stay_link','option');
        $logo		= '<strong class="logo"><a class="homebtn" href='. $stay_link .'>Dream Downtown</a></strong>';

        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $logo . $after_title; ?>
							<a href="<?php echo $stay_link; ?>" class="btn"><?php _e('Make A Reservation'); ?></a>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class stay_btn_widget
add_action('widgets_init', create_function('', 'return register_widget("stay_btn_widget");'));

//Follow Us widget
class follow_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function follow_widget() {
        parent::WP_Widget(false, $name = 'Follow Us Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<?php echo do_shortcode('[follow]') ?>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class follow_widget
add_action('widgets_init', create_function('', 'return register_widget("follow_widget");'));

//Mixcloud widget
class mixcloud_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function mixcloud_widget() {
        parent::WP_Widget(false, $name = 'Mixcloud Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
          <?php echo $before_widget; ?>
                  		<?php if ( $title )
                        	echo $before_title . $title . $after_title; ?>
							<?php the_field('mixcloud-sidebar','option'); ?>
               				<?php echo $after_widget; ?> 
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class mixcloud_widget
add_action('widgets_init', create_function('', 'return register_widget("mixcloud_widget");'));

//Mixcloud widget
class mixcloud_conditional_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function mixcloud_conditional_widget() {
        parent::WP_Widget(false, $name = 'Mixcloud Conditional Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
          <?php echo $before_widget; ?>
                  		<?php if ( $title )
                        	echo $before_title . $title . $after_title; ?>
							<?php the_field('mixcloud-sidebar-conditional'); ?>
               				<?php echo $after_widget;?>
        		<?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <?php 
    }
 
 
} // end class mixcloud_conditional_widget
add_action('widgets_init', create_function('', 'return register_widget("mixcloud_conditional_widget");'));


//====================//
//**** SHORTCODES ****//
//====================//

//shop shortcode
function shop_shortcode(){
	$shop= 	'<section class="widget shop"><div class="image-holder"><img class="resize" src="http://client.tvidesigns.com/taogroup/saharadreamswebsite/beta/wp-content/uploads/2014/03/img2.jpg" alt="Shop at our Online Store" title="Shop at our Online Store"></div><div><a class="btn" href="#" title="" alt="">Visit Our Online Store</a></div></section>';
    	return $shop;  
} 
function shop_insert_shortcode($atts, $content=null){  
	$shop= shop_shortcode();  
  		return $shop;  
}  
add_shortcode('shop', 'shop_insert_shortcode');  
/* add template tag- for use in themes shortcode = [shop] */  
function shop(){  
    print shop_shortcode(); 
} 

/*//stay shortcode
function stay_shortcode(){
	$title 		= 'Stay With Us';
	$logo		= '<strong class="logo"><a class="homebtn" href='. $stay_link .'>Dream Downtown</a></strong>';
    $stay_link	= get_field('stay_link','option');
    $stay_text 	= 'Make A Reservation'; 
	$stay		= '<header class="heading"><h2>'. $title . $logo .'</h2></header><a href=" ' .$stay_link. '" class="btn">'. $stay_text. '</a>';
    	return $stay;  
} 
function stay_insert_shortcode($atts, $content=null){  
	$stay= stay_shortcode();  
  		return $stay;  
}  
add_shortcode('stay', 'stay_insert_shortcode');  
/* add template tag- for use in themes shortcode = [stay]   
function stay(){  
    print stay_shortcode(); 
} 
*/
//instagram shortcode
function instagram_shortcode(){ 
  
	$ig= '<iframe src="http://snapwidget.com/sc/?u=ZHJlYW1kb3dudG93bnxpbnwyODV8M3wzfHxub3w1fG5vbmV8fHllcw==&v=6314" title="Instagram Widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:285px; height:285px"></iframe>';   
      
    return $ig;  
} 
function ig_insert_shortcode($atts, $content=null){  
  $ig= instagram_shortcode();  
  	return $ig;  
}  
add_shortcode('instagram', 'ig_insert_shortcode');  
/* add template tag- for use in themes shortcode = [instagram] */  
function instagram(){  
    print ig_shortcode(); 
} 



//follow us shortcode
function follow_shortcode(){ 

	$follow	= get_template_part('inc/follow','lobbybytes');  
			  echo	do_shortcode('[mc4wp_form]'); 
      
    return $follow;  
} 
function follow_insert_shortcode($atts, $content=null){  
  $follow= follow_shortcode();  
  	return $follow;  
}  
add_shortcode('follow', 'follow_insert_shortcode');  
/* add template tag- for use in themes shortcode = [follow] */  
function follow(){  
    print follow_shortcode(); 
}

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'mailchimp-for-wp' );
	wp_deregister_style( 'datestyle' );
}
//Callback function for Custom Comment Threading
function am_comment_list($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
       
        <article class="comments col-md-12" id="li-comment-<?php comment_ID() ?>">
            <header class="meta">
            <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a>
                </a>says <?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?>
            </header>
            <?php comment_text(); ?>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
                
            <?php endif; ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
 <?php }
 
 function wp_bootstrap_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' 				=> 'Main Menu', /* menu name */
    		'menu_class' 		=> 'nav navbar-nav',
    		'theme_location' 	=> 'primary', /* where in the theme it's assigned */
    		'container' 		=> 'false', /* container class */
    		'depth'             => 0,
    		'fallback_cb' 		=> 'wp_bootstrap_main_nav_fallback', /* menu fallback */
    		'walker' 			=> new Bootstrap_walker()
    	)
    );
}
  
 // Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

	 global $wp_query;
	 $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	 $class_names = $value = '';
	
		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
       
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
   	$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
   	$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	// if ( $args->has_children ) {
		  // $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    // }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
    	$item_output .= '</a>';
    }
    else {
    	$item_output .= '</a>';
    }

    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="videoWrapper">' . $match . '</div>';

        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;    
}
add_filter('the_content', 'div_wrapper');

if ( ! function_exists( 'articleimg' ) ) :
function articleimg(){
	if ( '' != get_the_post_thumbnail() ) { ?>
			<figure class="image-holder hidden-xs">
							<?php the_post_thumbnail('article-thumb');?></figure>

	<?php }else{ ?>
		<div style="display:none">
		<figure class="image-holder hidden-xs">
							<?php the_post_thumbnail('article-thumb'); ?>
	 	</figure>
	 	</div>
<?php }
}
endif; 
 ?>