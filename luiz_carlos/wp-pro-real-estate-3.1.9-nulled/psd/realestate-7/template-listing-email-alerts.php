<?php
/**
 * Template Name: Listing Email Alerts
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */
 
global $ct_options, $current_user, $wp_roles;
wp_get_current_user();

$ct_boxed = isset( $ct_options['ct_boxed'] ) ? esc_attr( $ct_options['ct_boxed'] ) : '';
$inside_page_title = get_post_meta($post->ID, "_ct_inner_page_title", true);

$search_params = array(); 
$loop = 0;
$count = 0;
$search_values = array('1','2');
foreach ($search_values as $t => $s) {                                  
	$term = get_term_by('slug',$s,$t);
	if($term != '0') {
		$search_params[] = $term->name;   
	}
}
$search_params[] = isset( $_GET['ct_keyword'] ) ? $_GET['ct_keyword'] : '';
$search_params = implode(', ', $search_params);

get_header();

if ( ! function_exists( 'wp_handle_upload' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
}

while ( have_posts() ) : the_post(); ?>

<div id="page-content" class="front-end-user-page <?php if($ct_boxed != 'full-width-two') { echo 'container'; } ?> <?php if(!is_user_logged_in()) { echo 'not-logged-in'; } ?>">

        <?php if(is_user_logged_in()) {
            get_template_part('/includes/user-sidebar');
        } ?>
    
        	<?php if(!is_user_logged_in()) {
            
                echo '<article class="col span_12 first listing-email-alerts card no-border marB60">';
                    echo '<div class="inner-content">';
                        echo '<div class="must-be-logged-in">';
                            echo '<h4 class="center marB20">' . __('You must be logged in to view this page.', 'contempo') . '</h4>';
                            echo '<p class="center login-register-btn marB0"><a class="btn login-register" href="#">Login/Register</a></p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            
            } else {

                echo '<article class="content col span_10 manage-alerts">';

                    if(function_exists('ctea_show_alert_creation')) {

                        echo '<div class="col span_12 first card no-border listing-email-alerts marB30">';
                            echo '<div class="inner-content">';
                                echo do_shortcode('[ctea_alert_creation]');
                                echo '<div class="clear"></div>';
                            echo '</div>';
                        echo '</div>';

                    } else {

                        echo '<div class="col span_12 first card no-border listing-email-alerts marB60">';
                            echo '<div class="inner-content">';
                                echo '<h4 class="center">' . __('Activate "Contempo Email Alerts" plugin via Appearance > Install Plugins.', 'contempo') . '</h4>';
                            echo '</div>';
                        echo '</div>';
                    }
 
                    global $wpdb, $current_user, $wp_query;
                    wp_get_current_user();

                    $table_name     = $wpdb->prefix . 'ct_search';
                    $results        = $wpdb->get_results( 'SELECT * FROM ' . $table_name . ' WHERE auther_id = ' . $current_user->ID . ' ORDER BY time DESC', OBJECT );

                    if(sizeof($results) !== 0) {

                        echo '<ul id="saved-searches">';
                            
                            get_template_part( 'layouts/saved-search-list' );

                        echo '</ul>';

                    }

                echo '</article>';

			}
            
            //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) );
            
            endwhile;

	echo '<div class="clear"></div>';
echo '</div>';

get_footer(); ?>