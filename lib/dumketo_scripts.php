<?php
global $dumketo;
/*** CSS ***/
function dumketo_css() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/responsive.css', 'all');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', 'all');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', 'all');
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', 'all');
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', 'all');
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css', 'all');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome-all.min.css', 'all');
    global $dumketo;
    if( $dumketo['css_name'] ):
        foreach ( $dumketo['css_name'] as $css_id => $css_value ) {
            if( $css_value['css-name'] ):
                $css = $css_value['css-name'];
                wp_enqueue_style( $css, get_template_directory_uri() . '/css/'.$css.'.css', 'all');   
            endif;
        }
    endif;
}
add_action( 'wp_enqueue_scripts', 'dumketo_css' );
require_once dumketo_extension_url . '/css/style.php';

/*** Jquery ***/
function dumketo_js() {
    $js_path = esc_url( get_template_directory_uri() . '/js/' );
    $deps = array( 'jquery' );
    wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'jquery-main', $js_path . 'jquery.js', $deps, '', true );
    wp_enqueue_script( 'bootstrap', $js_path . 'bootstrap.js', $deps, '', true );
    wp_enqueue_script( 'modernizer',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js', $deps, '', true);
    wp_enqueue_script( 'jquery.easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', $deps, '', true);
    wp_enqueue_script( 'wow',  $js_path . 'wow.min.js', $deps, '', true);
    wp_enqueue_script( 'owl', $js_path . 'owl.carousel.js', $deps, '', true );
    wp_enqueue_script( 'swiper', $js_path . 'swiper-bundle.min.js', $deps, '', true );
    wp_enqueue_script( 'swiper-animation', $js_path . 'swiper-animation.umd.js', $deps, '', true );
    global $dumketo;
    if( $dumketo['js_name'] ):
        foreach ( $dumketo['js_name'] as $js_id => $js_value ) {
            if( $js_value['js-name'] ):
                $js = $js_value['js-name'];
                wp_enqueue_script( $js, $js_path . $js.'.js', $deps, '', true);
            endif;
        }
    endif;
    wp_enqueue_script( 'custom', $js_path . 'custom.js', $deps, '', true);
}
add_action( "wp_enqueue_scripts", "dumketo_js" );

require_once dumketo_extension_url . '/js/custom-js.php';

//Register Admin css
add_action( 'in_admin_footer', 'meta_enqueue_scripts' );
function meta_enqueue_scripts() {
    require_once dumketo_extension_url . '/lib/admin/admin.php';
}


//Add Google Font
if( $dumketo['activate_font'] == 1 ):
    function add_google_fonts() {
        global $dumketo;
        $i = 1;
        foreach ( $dumketo['font_atts'] as $font_id => $font_value ) {
            if( $font_value['font_link'] ):
                wp_enqueue_style( 'google-fonts-'.$i, $font_value['font_link'], false );
            endif;
        $i++;}
    }
    add_action( 'wp_enqueue_scripts', 'add_google_fonts' );
endif;