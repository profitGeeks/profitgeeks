<?php
/**
 * search forms.
 */
?>

<form method="get" id="searchform<?php echo rand(1,100);?>" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s<?php echo rand(1,100);?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'pg' ); ?>" />
</form>