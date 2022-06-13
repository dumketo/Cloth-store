<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.
$prefix = 'dumketo';
CSF::createOptions( $prefix, array(
    'framework_title'         => 'Dumketo <small>by <a href="https://bd.linkedin.com/in/engrhasanjobayer" target="_blank">Hasan Ahmed Jobayer</a></small>',
    'menu_title'              => 'Dumketo Options',
    'menu_slug'               => 'dumketo-options',
    'menu_type'               => 'menu',
    'menu_capability'         => 'manage_options',
    'menu_icon'               => get_template_directory_uri() . '/images/d-favicon.png',
    'menu_position'           => null,
    'menu_hidden'             => false,
    'menu_parent'             => '',
    'show_bar_menu'           => true,
    'show_sub_menu'           => true,
    'show_in_network'         => true,
    'show_in_customizer'      => false,
    'show_search'             => true,
    'show_reset_all'          => true,
    'show_reset_section'      => true,
    'show_footer'             => true,
    'show_all_options'        => true,
    'show_form_warning'       => true,
    'sticky_header'           => true,
    'save_defaults'           => true,
    'ajax_save'               => true,
    'admin_bar_menu_priority' => 200,
    'footer_text'             => '',
    'footer_after'            => '',
    'footer_credit'           => __('Thank you for using the <a href="https://bd.linkedin.com/in/engrhasanjobayer" target="_blank">Dumketo</a> Theme .', 'dumketo'),
    'contextual_help'         => array(),
    'contextual_help_sidebar' => '',
    'enqueue_webfont'         => true,
    'async_webfont'           => false,
    'output_css'              => true,
    'theme'                   => 'dark',
    'class'                   => '',
    'defaults'                => array(),
) );

add_action( 'admin_menu', 'remove_csf_menu',12 );
function remove_csf_menu() {
    remove_submenu_page('tools.php','csf-welcome');
}

require_once( 'section/basic.php' );
require_once( 'section/head.php' );
require_once( 'section/home.php' );
require_once( 'section/inner.php' );
require_once( 'section/footer.php' );
require_once( 'section/advance.php' );

CSF::createSection( $prefix, array(
    'title'       => 'Backup',
    'icon'        => 'fas fa-shield-alt',
    'fields'      => array(
        array(
        'type' => 'backup',
        ),
    )
) );
