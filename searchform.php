<form class="search-form" action="<?php bloginfo(url);?>" method="get">
		<fieldset>
			<div class="row">
				<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search the website">
				<input type="submit" value="Search">
			</div>
		</fieldset>
</form>