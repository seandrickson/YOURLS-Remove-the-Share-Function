<?php
/*
Plugin Name: Remove the Share Function
Plugin URI: https://github.com/seandrickson/YOURLS-Remove-the-Share-Function
Description: Remove the Share button and box that toggles the sharing options on the Admin page
Version: 1.0
Author: Sean Hendrickson
Author URI: https://github.com/seandrickson
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();


// Dump the Share button...GET RID OF IT!!
yourls_add_filter( 'table_add_row_action_array', 'sean_rmv_row_action_share' );
function sean_rmv_row_action_share( $links ) {
	if( array_key_exists( 'share', $links ) )
		unset( $links[ 'share' ] );

	return $links;
}

// No Share Box either! GET OUT!!
yourls_add_filter( 'shunt_share_box', 'sean_shunt_share_box' );
function sean_shunt_share_box( $shunt ) {
	return $shunt = true;
}
