<?php
/***/

if ( !defined('ABSPATH') ) { die('-1'); } ?>
	if(get_field('event_details')): ?>
		 <section class="widget event"><ul><li><time datetime="2014-02-26">
						<?php the_sub_field('mon-sun'); ?> 
					<strong>
						<?php the_sub_field('day') ?>
					</strong>
						<?php the_sub_field('month') ?>
					<span>
						<?php the_sub_field('year') ?>
					</span></time><ul class="events">
				foreach( $posts as $post ) :
					setup_postdata( $post );
					tribe_get_template_part( $template_name );
				endforeach;
				 </ul></li></ul>

?>
