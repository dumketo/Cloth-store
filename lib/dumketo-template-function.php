<?php
/**
 *    
 * Dumketo Template Functions.
 * @package Dumketo
 *
 */

/*----------------------------------------------------------------------------------------------------*/


/**
 *
 * Theme : Dumketo
 * 404 page
 *
**/
if( ! function_exists( 'dumketo_404' ) ){
    function dumketo_404(){
        global $dumketo;
        get_template_part( 'inc/404/'. $dumketo['404-page'] );
    }
}

/**
 *
 * Theme : Dumketo
 * Header Portion Properties
 *
**/

if( ! function_exists( 'dumketo_header_part' ) ){
    function dumketo_header_part(){
        global $dumketo;        
        if ( $dumketo['float_social'] == 1 ) { get_template_part( 'inc/float' ); } ?>
        <!-- <div id="sticky-menu" class="sticky-menu"> -->
            <?php if ( $dumketo['topbar-section']==1): dumketo_top_part(); endif; ?>
            <?php if ( $dumketo['head_section']==1): dumketo_top_main_menu(); endif; ?>
        <!-- </div> -->
    <?php
    }
}

/**
 *
 * Theme : Dumketo
 * TopBar Information
 *
**/
if( ! function_exists( 'dumketo_top_part' ) ){
    function dumketo_top_part() {
        global $dumketo; ?>
        <section class="topbar-section d-none d-lg-block flex-container-160">
            <div class="<?php echo $dumketo['activate_container'] == 'container' ? 'container' : 'container-fluid'; ?>">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div class="main-header-logo d-flex justify-content-center">
                            <?php if ($dumketo['logo']['url']) : $logo = $dumketo["logo"]["url"]; ?>
                                <a href='<?php echo esc_url(home_url('/')); ?>'>
                                    <?php echo do_shortcode('[img img_name="' . $logo . '" format="" alt="Logo" class="img-fluid d-block logo"  ]') ?>
                                </a>
                            <?php else: ?>
                                <h2><?php echo get_bloginfo( 'name', 'display' );  ?></h2>
                            <?php endif; ?>
                        </div>                        
                    </div>                  
                    <div class="col">
                    </div>                    
                </div>
            </div>
        </section>
    <?php
	}
}

/**
 *
 * Theme : Dumketo
 * Secondary Top Information
 *
**/
if( ! function_exists( 'dumketo_top_main_menu' ) ){
    function dumketo_top_main_menu() {
        global $dumketo; ?>
        <section id="head-section" class="head-section d-none d-lg-block <?php echo $dumketo['head_container_fluid_extra_class']; ?>">
            <div class="<?php echo $dumketo['activate_head_container'] == 'container' ? 'container' : 'container-fluid'; ?>"> 
                <div class="row">
                    <div class="col col-1 align-self-center border-left">
                        <?php echo do_shortcode('[search_box]'); ?>                        
                    </div>                 
                    <div class="col col-10 align-self-center border-left border-right">
                        <div id="main-menu" class="d-flex justify-content-center align-items-center main-menu">
                            <?php
                            $menu_id = $dumketo['main-menu'];
                            if ($menu_id) :
                                $menu_locations = wp_get_nav_menu_object($menu_id);
                                wp_nav_menu(array(
                                    'menu'            => $menu_locations->slug,
                                    'theme_location'  => $menu_locations->slug,
                                    'container_id'    => 'cssmenu',
                                    'walker'          => new CSS_Menu_Maker_Walker()
                                ));
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col col-1 align-self-center border-right">
                        <?php woocommerce_header_cart(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php
	}
}

/**
 *
 * Theme : Dumketo
 * Frontpage Information
 *
**/
if( ! function_exists( 'dumketo_frontpage' ) ){
    function dumketo_frontpage() {
        global $dumketo;
        $layout = $dumketo['home_layout_manager']['enabled'];
        if ($layout): foreach ($layout as $key=>$value) {
            if( $key=='placebo' ):
            else:
            switch($key) {      
                case $key: get_template_part( 'template-parts/'.$key, 'page' ); 
                break;
            }
            endif;
        }
        endif;
    }
}

/**
 *
 * Theme : Dumketo
 * Inner Page Properties
 *
**/

if ( ! function_exists( 'dumketo_inner_heading' ) ) {
	function dumketo_inner_heading( $title  = array() ) {
        global $dumketo;
        $url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );
        $inner_meta = get_post_meta( get_the_ID(), '_inner_meta_options', 1 );
    ?>
        <section class="inner-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="inner-banner-title">
                            <h1 class="wow zoomInDown mb-0"><?php echo is_page() || is_single() ? get_the_title() : get_the_title( get_option('page_for_posts', true) ) ?></h1>
                        </div>                       
                    </div>
                </div>
            </div>
        </section>
    <?php
	}
}

if( ! function_exists( 'dumketo_inner_page_content_before' ) ){
    function dumketo_inner_page_content_before(){
        global $dumketo;
        echo $dumketo["inner_page_sidebar"] == 1 ? '<div class="col-sm-12 col-md-8 col-lg-8">' : '<div class="col-sm-12">';
    }
}

if ( ! function_exists( 'dumketo_inner_page_content' ) ) {
	function dumketo_inner_page_content() {
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile; wp_reset_query();
        //echo '</div>';
	}
}

if ( !function_exists( 'dumketo_inner_page_sidebar' ) ) {
	function dumketo_inner_page_sidebar() {
        global $dumketo;
        if ( $dumketo["inner_page_sidebar"] == 1 ): ?>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php get_sidebar('inner'); ?>
            </div>
        <?php endif; 
	}
}
if ( !function_exists( 'dumketo_inner_page_extra_content' ) ) {
	function dumketo_inner_page_extra_content( $title  = array() ) {
	}
}


if ( !function_exists( 'dumketo_inner_footer_part' ) ) {
    function dumketo_inner_footer_part( $title  = array() ) {
        global $dumketo;
        $inner_meta = get_post_meta( get_the_ID(), '_inner_meta_options', 1 );
        if($inner_meta):
             $layout = $inner_meta['inner_footer_section']['enabled'];
            if ($layout): foreach ($layout as $key=>$value) {
                switch($key) { 
                    case $key: get_template_part( 'template-parts/home_part/'.$key, 'page' ); 
                    break;
                }
            } endif;
        endif;      
    }
}


/**
 *
 * Theme : Dumketo
 * Footer Section Information
 *
**/

if( ! function_exists( 'dumketo_footer_contact_info' ) ){
    function dumketo_footer_contact_info() {
        global $dumketo; ?>
        <section class="footer-contact">
            <div class="container">
                <div class="row justify-content-center">
                    <?php echo do_shortcode('[dumketo_content column="4" column_class="border-white-fade-right py-5" title=""]'); ?>
                    <div class="col col-lg-8 pl-lg-0">
                        <div class="border-white-fade-bottom p-lg-5">
                            <div class="subscribe-form mb-4 mb-lg-0">
                                <div class="footer-media media align-items-center justify-content-start">                                
                                    <h2>NEWSLETTER SIGNUP</h2>       
                                </div>
                                <form class="form-inline">
                                    <input type="text" class="form-control rounded-0" style="width: 75%;" placeholder="email@example.com">
                                    <button style="width: 25%;"  type="submit" class="btn btn-primary rounded-0 border-0">SUBSCRIBE</button>
                                </form>
                            </div>  
                        </div>

                        <div class="row pl-lg-5 py-lg-5">
                            <?php echo do_shortcode('[dumketo_menu column="4" column_class="" main_class="footer-menu" content="" title="INFORMATION" menu="INFORMATION"]'); ?>
                            <?php echo do_shortcode('[dumketo_menu column="4" column_class="" main_class="footer-menu" content="" title="WHY CHOOSE" menu="WHY CHOOSE"]'); ?>
                            <?php echo do_shortcode('[dumketo_menu column="4" column_class="" main_class="footer-menu" content="" title="MY ACCOUNT" menu="MY ACCOUNT"]'); ?>
                        </div>
                    </div>
                    
                     
                    <?php //echo do_shortcode('[dumketo_social_links column="3" column_class="align-self-center footer-sm-center" title="follow us" align_class="justify-content-lg-start justify-content-center" position ="top"]'); ?>
                    
                    <?php //echo do_shortcode('[dumketo_get_touch column="4" title="Get In Touch" phone="1" email="1" address="1" hour="" social="" ]' );; ?> 
                    <?php //echo do_shortcode('[dumketo_hours column="4" column_class="" title="Business Hours"]'); ?> 
                    <?php //echo do_shortcode('[dumketo_menu column="4" column_class="" main_class="footer-menu" title="Services" menu="Services"]'); ?>               
                            
                    <?php //echo do_shortcode('[dumketo_social_links column="4" column_class="" title="GET US ON SOCIAL" align_class="justify-content-start" position ="top"]'); ?>
                </div>
            </div>
        <?php if( $dumketo['both_footer_include'] == 2): echo '</section>'; endif; ?>
    <?php
	}
}

/**
 *
 * Theme : Dumketo
 * Footer Site Credit
 *
**/

add_action( 'dumketo_credit', 'dumketo_site_credit' );
function dumketo_site_credit(){
global $dumketo;
?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <?php echo do_shortcode('[dumketo_copyright column="12" font_weight="bold" ]'); ?>
            </div>
        </div>
    </div>
<?php
}



/**
 *
 * Theme : Dumketo
 * Contact page Properties
 *
**/

if ( ! function_exists( 'dumketo_contact_page_content' ) ){
    function dumketo_contact_page_content(){
    ?>                   
        <?php 
        while ( have_posts() ) : the_post();
            $the_content = apply_filters('the_content', get_the_content());
            if ( !empty($the_content) ):
                echo '<div class="col-sm-12 col-md-12 col-lg-12">'; 
                    echo '<div class="inner contact-content">';
                        the_content();
                    echo '</div>';
                echo '</div>';
            endif;
        endwhile; 
        ?>            
    <?php
    }
    
}

if ( ! function_exists( 'dumketo_contact_info' ) ) {
    function dumketo_contact_info() {
        global $dumketo;
        echo do_shortcode( '[dumketo_contact_page_form column="8" form_id="82" title="Send us an Email" ]' );
        echo do_shortcode( '[dumketo_get_touch column="4" title="" footer="" contact="1" phone="yes" email="yes" address="yes" social="yes" ]' );
    }
}

if ( ! function_exists( 'dumketo_contact_footer_part' ) ) {
    function dumketo_contact_footer_part() {
        global $dumketo;
        $layout = $dumketo['contact_page_footer_section']['enabled'];
        if ($layout): foreach ($layout as $key=>$value) {
            switch($key) { 
                case $key: get_template_part( 'template-parts/home_part/'.$key, 'page' ); 
                break;
            }
        }endif;
    }
}


/**
 *
 * Theme : Dumketo
 * Blog page Properties
 *
**/

if ( ! function_exists( 'dumketo_blog_page_content' ) ){
    function dumketo_blog_page_content(){
        global $dumketo;
?>
    <section class="about-banner">            
        <div class="container">
            <div class="row">
                <?php if( $dumketo['blog_page_text'] ): ?>
                <div class="col-sm-12 col-lg-12"> 
                    <div class="inner blog-con">
                        <?php echo wpautop ( $dumketo['blog_page_text'] ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <?php endif; ?>
                <?php
                $blog_count=1;
                if (have_posts()) :
                    echo $dumketo["blog_page_sidebar"]==1 ? '<div class="col-sm-12 col-md-9 col-lg-9">' : '<div class="col-sm-12">';
                        echo $dumketo["blog_page_sidebar"]==1 ? '<div class="row">' : '';
                            while ( have_posts() ) : the_post();
                                include( locate_template('content.php') );
                            $blog_count++; endwhile; wp_reset_query();
                        echo $dumketo["blog_page_sidebar"]==1 ? '</div>' : '';
                    echo '</div>';?>
                    <?php if ( $dumketo["blog_page_sidebar"] == 1 ): ?>
                        <div class="col-sm-12 col-lg-3">
                            <?php get_sidebar(); ?>
                        </div> 
                    <?php endif; ?>
                <?php else: ?>
                    <div class="col-sm-12 col-lg-12">
                        <img class="d-block img-fluid mx-auto" src="<?php echo $dumketo['coming_soon_image']['url']; ?>" alt="coming-soon"/>
                    </div>
                <?php endif; ?>
                <div class="col-sm-12 col-lg-12">
                    <?php echo do_shortcode("[pagination]"); ?>
                </div>
            </div>
        </div>
    </section>
<?php
    }
}


if ( ! function_exists( 'dumketo_blog_footer_part' ) ) {
    function dumketo_blog_footer_part() {
        global $dumketo, $blog_id;
        $inner_meta = get_post_meta( $blog_id, '_inner_meta_options', 1 );
        $layout = $inner_meta['inner_footer_section']['enabled'];
        if ($layout): foreach ($layout as $key=>$value) {
            switch($key) { 
                case $key: get_template_part( 'template-parts/home_part/'.$key, 'page' ); 
                break;
            }
        } endif; 
    }
}



if ( ! function_exists( 'dumketo_team_footer_part' ) ) {
    function dumketo_team_footer_part() {
        global $dumketo;
        $layout = $dumketo['team_footer_section']['enabled'];
        if ($layout): foreach ($layout as $key=>$value) {
            switch($key) { 
                case $key: get_template_part( 'template-parts/home_part/'.$key, 'page' ); 
                    break;
            }
        }endif;
    }
}