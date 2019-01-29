<?php
// // Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'iconmoon','bootstrap','bootstrap-theme','chosen','swiper' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 1 );

// END ENQUEUE PARENT ACTION


// BEGIN DASHBOARD LOGO CUSTOMISATION
function wpb_custom_logo() {
	echo '
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url(' . get_stylesheet_directory_uri() . '/images/custom-logo.png) !important;
				background-position: 0 0;
                color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-custom-logoitem .ab-icon {
				background-position: 0 0;
			}
		</style>
	';
}
 
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// END DASHBOARD LOGO CUSTOMISATION 

// BEGIN LOGIN PAGE CUSTOMISATION 
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
            height:47px;
            width:268px;
            background-size: 268px 47px;
            background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        #loginform {
            border-radius: 5px;
            box-shadow: 0 0 12px #767676;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// END LOGIN PAGE CUSTOMISATION 