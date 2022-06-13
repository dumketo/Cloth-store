<?php
global $dumketo;
define( 'dumketo_extension_url',   get_template_directory() );
require_once dumketo_extension_url . '/lib/dumketo_scripts.php';
require_once dumketo_extension_url . '/lib/paginations.php';
require_once dumketo_extension_url . '/lib/general-functions.php';
require_once dumketo_extension_url . '/lib/shortcodes.php';
require_once dumketo_extension_url . '/lib/schema.php';
require_once dumketo_extension_url . '/inc/Aqua-Resizer/aq_resizer.php';


require_once dumketo_extension_url . '/inc/activate_plugin/activate_plugin.php';      //Register Activate Plugin
require_once dumketo_extension_url . '/lib/theme-posttype.php';                //Register Posttype   
require_once dumketo_extension_url . '/inc/widget/recent-post.php';

require_once dumketo_extension_url . '/inc/wp_bootstrap_navwalker.php';                //Register Bootstarp Navigation Walker
require_once dumketo_extension_url . '/inc/wp_menu_navwalker.php';                     //Register CssMenu Navigation Walker
require_once dumketo_extension_url . '/inc/custom_navwalker.php';                      //Register Custom Navigation Walker for 


if ( !is_admin() ) {
    if ( $dumketo['activate_lazy_load']==1 ){
        require_once dumketo_extension_url . '/inc/lazy-load/lazy-load.php';
    }
}