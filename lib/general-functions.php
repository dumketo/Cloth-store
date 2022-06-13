<?php
/**
 * Wordpress Setup
**/
function dumketo_setup() {
    load_theme_textdomain( 'dumketo', get_template_directory() . '/languages' );
    add_editor_style();
    add_theme_support( 'automatic-feed-links' );
    //add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
    register_nav_menu( 'primary', __( 'Primary Menu', 'dumketo' ) );
    register_nav_menu( 'secondary', __( 'Secondary Menu', 'dumketo' ) );
    register_nav_menu( 'topbar_menu', __( 'Topbar Menu', 'dumketo' ) );
    register_nav_menu( 'inner_service_menu', __( 'Inner Menu', 'dumketo' ) );
    register_nav_menu( 'footer_menu', __( 'footer Menu', 'dumketo' ) );
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );
    set_post_thumbnail_size( 624, 9999 );
    add_image_size( 'featured-thumb', 64, 64, true );
    add_image_size( 'home-gallery', 570, 360, true );
    add_image_size( 'home-blog-thumb', 570, 360, true );
    add_image_size( 'blog-thumb', 1200, 330, true );
}
add_action( 'after_setup_theme', 'dumketo_setup' );

/**
 * Register sidebars.
 * Registers our main widget area and the front page widget areas.
**/

function dumketo_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'dumketo' ),
        'id'            => 'sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Sidebar Inner', 'dumketo' ),
        'id'            => 'sidebar-inner',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar(array(
        'name'          => __( 'Page', 'dumketo' ),
        'id'            => 'sidebar-page',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    register_sidebar( array(
        'name'          => __( 'Sidebar Search', 'dumketo' ),
        'id'            => 'sidebar-search',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer 3 col', 'dumketo' ),
        'id'            => 'sidebar-footer-3col',
        'before_widget' => '<div id="%1$s" class="widget col-sm-12 col-xs-12 col-md-4 col-lg-4 clear-pm %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-titel">',
        'after_title'   => '</h3>'
    ));
    register_sidebar(array(
        'name'          => __( 'Footer 4 col', 'dumketo' ),
        'id'            => 'sidebar-footer-4col',
        'before_widget' => '<div id="%1$s" class="widget col-sm-12 col-xs-12 col-md-3 col-lg-3 clear-pm %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-titel">',
        'after_title'   => '</h3>'
    ));

}
add_action( 'widgets_init', 'dumketo_widgets_init' );

if ( ! function_exists( 'dumketo_content_nav' ) ) :
function dumketo_content_nav( $html_id ) {
    global $wp_query;
    $html_id = esc_attr( $html_id );
    if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'dumketo' ); ?></h3>
            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'dumketo' ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'dumketo' ) ); ?></div>
        </nav><!-- #<?php echo $html_id; ?> .navigation -->
    <?php endif;
}
endif;

/**
 * create PHP On Text Widget
**/
function php_execute($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start(); eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}
add_filter('widget_text','php_execute',100);


/**
 * Lazy Load functions
**/
return $dumketo['activate_lazy_load'] ?? 'default value';
if ( $dumketo['activate_lazy_load']==1 ){
    if ( function_exists( 'lazyload_images_add_placeholders' ) )
        $content = lazyload_images_add_placeholders( $content );
    if ( function_exists( 'lazyload_images_add_placeholders' ) )
        ob_start( 'lazyload_images_add_placeholders' );
}


// Disable Gutenberg
// if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {    
//     add_filter('use_block_editor_for_post_type', '__return_false', 100);    
// } else {    
//     add_filter('gutenberg_can_edit_post_type', '__return_false');    
// }


/**
 * Add Image tag Class
**/
function image_tag_class($class) {
    $class .= ' img-fluid d-block';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

if( $dumketo['activate_remove_width_height']==1 ){
    add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
    add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

    function remove_width_attribute( $html ) {
       $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
       return $html;
    }
}

/**
 * remove wp version param from any enqueued scripts
**/
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


function remove_footer_admin () {
    echo bloginfo("name").'  |  Developed by <a href="http://dumketo.github.io/Resume/" target="_blank">Hasan Ahmed Jobayer</a>. &nbsp;</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/**
 * Remove p from editor img tag
**/
function filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');



/**
 * Add Quicktags on editor
**/
if( !function_exists('_add_my_quicktags') ){
    function _add_my_quicktags() {
        global $dumketo; ?>
        <script type="text/javascript">
            QTags.addButton( 'h1', 'h1', '<h1>', '</h1>' );
            QTags.addButton( 'h2', 'h2', '<h2>', '</h2>' );
            QTags.addButton( 'h3', 'h3', '<h3>', '</h3>' );
            QTags.addButton( 'p', 'p', '<p>', '</p>' );
            QTags.addButton( 'span', 'span', '<span>', '</span>' );
            QTags.addButton( 'br', 'br', '<br />'  );            
        </script>
    <?php }
    add_action('admin_print_footer_scripts',  '_add_my_quicktags');
}

if ( $dumketo["content-show-option"]==3 ) {
    function home_content_popup_qtag(){
        if(wp_script_is("quicktags")) {
        ?>
            <script type="text/javascript">
                function getSel() { var txtarea = document.getElementById("content"); var start = txtarea.selectionStart; var finish = txtarea.selectionEnd; return txtarea.value.substring(start, finish); }
                QTags.addButton( "popup", "PopUp", callback );
                function callback() { var selected_text = getSel(); QTags.insertContent('<div id="content-popup" class="white-popup mfp-hide inner">\n' +  selected_text + '\n</div>\n<a href="#content-popup" class="open-popup-link">Read More</a>'); }
            </script>
        <?php
        }
    }
    add_action("admin_print_footer_scripts", "home_content_popup_qtag");
}
if ( !$dumketo["content-show-option"]==3 ) {
    function remove_popup_html_code() {
    ?>
        <script>
            jQuery(document).ready(function($){ $("#test-popup").removeClass("mfp-hide").removeClass("white-popup"); });
        </script>
    <?php
    }
    add_filter('wp_footer', 'remove_popup_html_code');
}

/**
 * Image alt replaced
**/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {
    global $dumketo;
    $img_alt = $dumketo['img_alt'];
	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
		$my_image_title = ucwords( strtolower( $my_image_title ) );
		$my_image_meta = array(
			'ID'		    => $post_ID,
			'post_title'	=> $img_alt . $my_image_title,
		);
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $img_alt . $my_image_title );
		wp_update_post( $my_image_meta );
	}
}

function dumketo_custom_alt( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
    $post_id = $_REQUEST['post_id'];
    $alt_tag = get_post_meta( $post_id, '_yoast_wpseo_title', true );
    return str_replace("alt=\"{$alt}\"", "alt=\"{$alt_tag}\"", $html);    
}
add_filter('image_send_to_editor', 'dumketo_custom_alt', 1, 8);

//add_filter('get_image_tag', 'image_alt_tag' );
//function image_alt_tag( $html, $id, $alt ) {
//    $post_id = $_REQUEST['post_id'];
//    $alt_tag = get_post_meta( $post_id, '_yoast_wpseo_title', true );  
//    return str_replace("alt=\"{$alt}\"", "alt=\"{$alt_tag}\"", $html);
//}

/**
 * Dumketo to top
**/
add_action( 'wp_footer', 'dumketo_top' );
function dumketo_top() {
?>
    <style type="text/css">
        .totop { position: fixed; bottom: 10px; right: 10px; cursor: pointer; background: rgba(0, 0, 0, 0.50); color: #fff; border-radius: 25px; height: 45px; line-height: 45px; padding: 0px 14px; font-size: 18px; opacity: 0.5; -webkit-transition: .3s opacity ease-in-out; transition: .3s opacity ease-in-out; }
        .totop:hover { opacity: 1;-webkit-transition: .5s opacity ease-in-out;transition: .5s opacity ease-in-out;text-decoration: none; }
        .totop:focus { outline: 0; }
        .totop span.glyphicon.glyphicon-menu-up { vertical-align: middle; }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function(a){ var e=function(){a("html, body").animate({scrollTop:0},1E3);return!1};a.fn.tottTop=function(f){var b=a.extend({scrollTop:800,duration:1E3,scrtollTopBtnDuration:400},f);return this.each(function(){var c=a(this),d=a(window);d.scroll(function(){d.scrollTop()>b.scrollTop?c.fadeIn(b.scrtollTopBtnDuration):c.fadeOut(b.scrtollTopBtnDuration)});c.click(e) })}});
        jQuery(document).ready(function($) { $('.totop').tottTop({ scrollTop: 200 }); });
    </script>
    <div class="totop"><i class="fas fa-arrow-alt-circle-up"></i></div>
<?php
}

if ( $dumketo["main_nav_sticky"]==1 ) {
    add_action( 'wp_footer', 'dumketo_sticky' );
    function dumketo_sticky(){ ?>
        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.sticky.js'></script>
        <script type="text/javascript">
            jQuery(document).ready(function($){ $("#head-section").sticky({ topSpacing:0, zIndex:9 }); });
        </script>
    <?php }
}

function dumketo_attachment_id_by_url( $url ) {
    global $wpdb;
    $path = parse_url( $url, PHP_URL_PATH );
    $id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid LIKE '%s' LIMIT 1", '%' . $path ) );
    return $id;
}

function dumketo_excerpt( $limit ) {
    $readmore1 =  __('Read More', 'dumketo');
    $readmore = '>'.$readmore.'<';
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ... <a href="'.home_url( 'testimonials/' ).'">'.$readmore1.'</a> ';
    }else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    $excerpt = str_replace($readmore,'><',$excerpt);
    return $excerpt;
}

function dumketo_excerpt_blog( $limit ) {
    $readmore1 =  __('Read More', 'dumketo');
    $readmore = '>'.$readmore.'<';
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ...';
    }else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    $excerpt = str_replace($readmore,'><',$excerpt);
    return $excerpt;
}
