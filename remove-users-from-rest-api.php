<?php
/**
 * Plugin Name:        	Disable REST API User Endpoints
 * Description:         Disable the Users REST API user endpoint for security reasons.
 * Author:              Ash Whiting for BrightLocal
 * Author URI:          https://brightlocal.com
 * Text Domain:         smntcs-disable-rest-api-user-endpoints
 * Version:             1.1
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package bl_disable_rest_users
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable REST API user endpoints.
 *
 * @param array $endpoints The original endpoints.
 * @return array The updated endpoints.
 * @since 1.0.0
 */
function bl_rest_endpoints( $endpoints ) {
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}

	return $endpoints;
}
add_filter( 'rest_endpoints', 'bl_rest_endpoints' );