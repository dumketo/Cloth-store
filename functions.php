<?php
$front_page_id = get_option( 'page_on_front' );
$team_page_id  = ''; 
$page_id = get_the_ID();
$blog_id = get_option( 'page_for_posts' );
$dumketo = get_option( 'dumketo' );
define( 'dumketo_extension_url',   get_template_directory() );
$home_data =  array(
    'enabled'  => array(
    ),
    'disabled' => array(
        'banner'          => 'Banner',
        'content'         => 'Page Content',
        'map'             => 'Map',
        'footer-contact'  => 'Footer Contact Info',
        'options'         => 'Dumketo Options',
    ),
);
$inner_footer_data =  array(
    'enabled'  => array(
    ),
    'disabled' => array(
        'map'             => 'Map',
        'footer-contact'  => 'Footer Contact Info',
    ),
);
$pluginList = get_option( 'active_plugins' );
$plugin = 'codestar/codestar-framework.php'; 
if ( in_array( $plugin , $pluginList ) ) {
    require_once dumketo_extension_url . '/lib/codestar/admin-options.php';
}
if ( file_exists( dumketo_extension_url .'/lib/codestar-metabox/cs-framework.php' ) ) {
    require_once dumketo_extension_url .'/lib/codestar-metabox/cs-framework.php';
    define( 'CS_ACTIVE_FRAMEWORK', false  ); 
    define( 'CS_ACTIVE_LIGHT_THEME',  true  );
    define( 'CS_ACTIVE_CUSTOMIZE',   false );
}

// WordPress Template Function
require_once dumketo_extension_url . '/lib/dumketo-template-hooks.php';
require_once dumketo_extension_url . '/lib/dumketo-template-function.php';

// WordPress Function
require_once dumketo_extension_url . '/lib/dumketo_scripts.php';
require_once dumketo_extension_url . '/lib/paginations.php';
require_once dumketo_extension_url . '/lib/general-functions.php';
require_once dumketo_extension_url . '/lib/shortcodes.php';
require_once dumketo_extension_url . '/lib/schema.php';
//Woocommerce FUnction
require_once dumketo_extension_url . '/lib/woo/woo-function.php';
require_once dumketo_extension_url . '/lib/woo/woocommerce-functions.php';
require_once dumketo_extension_url . '/lib/woo/woocommerce-config.php';
require_once dumketo_extension_url . '/lib/woo/woocommerce-template-hooks.php';


require_once dumketo_extension_url . '/lib/activate_plugin/activate_plugin.php'; 
require_once dumketo_extension_url . '/lib/theme-posttype.php';
// Menu Navwalker
require_once dumketo_extension_url . '/lib/wp_bootstrap_navwalker.php';               
require_once dumketo_extension_url . '/lib/cssmenu_navwalker.php';                     