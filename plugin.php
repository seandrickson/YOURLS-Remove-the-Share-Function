<?php
/*
Plugin Name: Remove the Share Function
Plugin URI: https://github.com/seandrickson/YOURLS-Remove-the-Share-Function
Description: Remove the Share button and box that toggles the sharing options on the Admin page
Version: 1.1
Author: Sean Hendrickson
Author URI: https://github.com/seandrickson
*/

// No direct call
if ( !defined( 'YOURLS_ABSPATH' ) ) die();


// Dump the Share button from each row of the admin table...GET RID OF IT!!
yourls_add_filter( 'table_add_row_action_array', 'sean_rmv_row_action_share' );
function sean_rmv_row_action_share( $actions ) {
	if ( is_array( $actions ) ) {
		unset( $actions['share'] );
	}

	return $actions;
}

// No Share Box either! GET OUT!!
// Short-circuits yourls_share_box() on the admin index, the bookmarklet page and the stats page.
yourls_add_filter( 'shunt_share_box', 'sean_shunt_share_box' );
function sean_shunt_share_box( $shunt ) {
	return '';
}

// The stats page (yourls-infos.php) still draws a "Share" tab whose content is now empty: hide it.
yourls_add_action( 'html_head', 'sean_hide_share_tab' );
function sean_hide_share_tab( $args ) {
	// YOURLS passes action arguments as an array: array( $context )
	$context = is_array( $args ) ? reset( $args ) : $args;
	if ( 'infos' !== $context ) {
		return;
	}
	?>
	<style>
		#headers li:has( a[href="#stat_tab_share"] ),
		#stat_tab_share { display: none !important; }
	</style>
	<script>
		jQuery( function( $ ) {
			$( '#headers a[href="#stat_tab_share"]' ).closest( 'li' ).remove();
			$( '#stat_tab_share' ).remove();
			// Someone landed on .../+#stat_tab_share: show the first tab instead of a blank page
			if ( '#stat_tab_share' === location.hash ) {
				$( '#tabs ul#headers li a:first' ).click();
			}
		} );
	</script>
	<?php
}
