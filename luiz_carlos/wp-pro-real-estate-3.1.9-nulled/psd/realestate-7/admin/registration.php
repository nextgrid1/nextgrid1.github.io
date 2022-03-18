<?php

function ct_is_not_activated() {
  return (get_option( 'realestate-7_license_key_status', false) != 'valid');
}

function ct_exclusives_available() {
	$updater = new CT_Theme_Updater_Admin();
	$item_id = $updater->get_license_item_id();
	$exclusives_available = in_array($item_id, [9797, 2867]);

	return $exclusives_available;
}

function prefix_theme_updater() {
  require( get_template_directory() . '/admin/updater/theme-updater-admin.php' );
  
  function ct_activation_admin_notices() {
    if(ct_is_not_activated()) {
      
      $link = admin_url( 'themes.php?page=' . 'realestate-7' . '-license' );

      echo '<style>';
        echo '#theme-activation-notice { display: flex; align-items: center; justify-content: center;}';
          echo '#theme-activation-notice-col-one { width: 80%; margin: 0 30px 5px 25px;}';
            echo '#theme-activation-notice-col-one h3 { margin-bottom: 0;}';
          echo '#theme-activation-btn { margin-right: 10px;}';
          echo '@media only screen and (max-width: 767px) {';
            echo '#theme-activation-notice { flex-wrap: wrap; justify-content: left; padding: 0 20px 20px 20px;}';
            echo '#theme-activation-notice-col-one { width: 100%; margin: 0;}';
              echo '#theme-activation-btn { margin-top: 10px;}';
          echo '}';
      echo '</style>';

      echo '<div id="theme-activation-notice" class="updated notice">';
        echo '<div id="theme-activation-notice-col-one">';
              echo '<h3><strong>' . __('Theme requires activation', 'contempo') . '</strong></h3>';
              echo '<p>' . __('Your license key is required to receive updates and support.', 'contempo') . '</p>';
        echo '</div>';
        echo '<a id="theme-activation-btn" class="button button-primary" href="' . esc_url($link) . '">' 
                . __('Open Theme License Page', 'contempo') . '</a>';
          
          echo '<div class="clear"></div>';
      echo '</div>';

    }
  }

  add_action( 'admin_notices', 'ct_activation_admin_notices', -100 );

  if(is_admin() && get_option( 'ct_redirect_to_activation') === '1') {
    $redirect_url = admin_url( 'themes.php?page=' . 'realestate-7' . '-license' );
    delete_option( 'ct_redirect_to_activation' );
    wp_redirect($redirect_url);
    exit;
  }
}

add_action( 'after_setup_theme', 'prefix_theme_updater' );

// add_filter( 'ct_need_purchase_code', 'ct_need_code', 100);
// function ct_need_code() {
//   return  (get_option( 'realestate-7_license_key_status', false) != 'valid');
// }

function ct_theme_upgrader_process_complete($upgrader_object, $options) {
  if ($options['action'] == 'update' && $options['type'] == 'theme' ) {
    foreach($options['themes'] as $each_plugin) {
      if ($each_plugin == 'realestate-7' && ct_is_not_activated()) {
        $current_version = wp_get_theme()->get('Version');
        if(version_compare('3.0.6', $current_version, '>')) {
          update_option( 'ct_redirect_to_activation', '1');
        }
      }
   }
  }
}

add_action( 'upgrader_process_complete', 'ct_theme_upgrader_process_complete', 1, 2);
