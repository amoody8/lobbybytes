<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.pllexislider').pllexislider({
		animation: "slide",
		directionNav: true,
		touch: true
	});
});
</script>
<div class="pllexislider">
    <ul class="no-bullet slides">
		<?php 
			if ( isset($data_arr) && is_array($data_arr) ) {
				foreach ($data_arr as $data) {
					foreach ( $data as $k => $v) {
						$$k = $v;
					}
					echo '<li>'. "\n";
					echo '<a target="_blank" href="'.$link.'"><img src="'.$image.'" alt="'.$text.'"></a>' . "\n";
					echo '</li>' . "\n";
				
				}
			}
        ?>
    </ul>
</div>
