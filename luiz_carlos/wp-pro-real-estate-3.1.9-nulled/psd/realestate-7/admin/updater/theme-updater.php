<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://contempothemes.com/wp-real-estate-7/', // Site where EDD is hosted
		'item_name'      => 'WP Pro Real Estate 7', // Name of theme
		'theme_slug'     => 'realestate-7', // Theme slug
		'version'        => REALESTATE7_SL_THEME_VERSION, // The current version of this theme
		'author'         => 'Contempo Themes', // The author of this theme
		// 'license'    => '', 
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://contempothemes.com/checkout/?edd_action=add_to_cart&download_id=9797', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
		'item_id'        => '8734',
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'contempo' ),
		'enter-key'                 => __( 'Enter your Themeforest purchase code.', 'contempo' ),
		'license-key'               => __( 'License Key', 'contempo' ),
		'license-action'            => __( 'License Action', 'contempo' ),
		'deactivate-license'        => __( 'Deactivate License', 'contempo' ),
		'activate-license'          => __( 'Activate License', 'contempo' ),
		'status-unknown'            => __( 'License status is unknown.', 'contempo' ),
		'renew'                     => __( 'Real Estate 7 Yearly.', 'contempo' ),
		'unlimited'                 => __( 'unlimited', 'contempo' ),
		'license-key-is-active'     => __( 'License key is active.', 'contempo' ),
		'expires%s'                 => __( 'Expires %s.', 'contempo' ),
		'expires-never'             => __( 'Lifetime License.', 'contempo' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'contempo' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'contempo' ),
		'license-key-expired'       => __( 'License key has expired.', 'contempo' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'contempo' ),
		'license-is-inactive'       => __( 'License is inactive.', 'contempo' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'contempo' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'contempo' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'contempo' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'contempo' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'contempo' ),
	)

);
