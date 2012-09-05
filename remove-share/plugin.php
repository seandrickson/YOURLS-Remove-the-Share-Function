<?php /*
Plugin Name: Remove the Share Function
Plugin URI: http://yourls.org/
Description: Remove the Share button and box that toggles the sharing options on the Admin page
Version: 1.0
Author: Sean Hendrickson
Author URI: http://flavors.me/seandrickson
*/

// Dump the Share button...GET RID OF IT!!
function sean_rmv_row_action_share( $links ) {
	if( array_key_exists( 'share', $links ) )
		unset( $links[ 'share' ] );
	
	return $links;
} yourls_add_filter( 'table_add_row_action_array', 'sean_rmv_row_action_share' );

// No Share Box either! GET OUT!!
function sean_shunt_share_box( $shunt ) {
	return $shunt = true;
} yourls_add_filter( 'shunt_share_box', 'sean_shunt_share_box' );