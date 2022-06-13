<?php
function home_link( ) {
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') { $isSecure = true; } elseif ( !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on' ) { $isSecure = true; }
    $REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
    $home = $REQUEST_PROTOCOL .'://'. $_SERVER['SERVER_NAME'];
    return $home;
}
add_shortcode( 'home_link', 'home_link' );

function phone_number( ) {
    global $dumketo;
    $phone = str_replace(" ", "", $dumketo['phone']);
    return $phone;
}
add_shortcode( 'phone_number', 'phone_number' );

function img_title_alt( $atts = array() ) {
    global $dumketo;
    $img_alt = $dumketo['img_alt'];
    $alt = '';
    $class= '';
    $id = '';
    $hover_image='';
    $format = $atts["format"];
    $hover_img = $atts["hover_image"];
    $img_name = $atts["img_name"];
    $alt_value = $atts["alt"];
    if( $format ):
        $img_url = get_template_directory_uri()."/img/".$img_name.".".$format;
    else:
        $img_url = $img_name;
    endif;
    if( isset( $hover_img ) ? $hover_img : '' ):
        $hover_image = "data-hover-src=".$hover_img;
    endif;
    if ( $alt_value ):
        $alt = $img_alt . $alt_value;
    else:
        $alt = $img_alt . $img_name;
    endif;
    if ( isset( $atts['class'] ) ? $atts['class'] : '' ) :
        $class = 'class="' . str_replace( ",", " ", $atts['class'] ) . '"';
    endif;
    if( isset( $atts['id'] ) ? $atts['id'] : '' ):
        $id = "id=" . $atts['id'];
    endif;
    $image = "<img $id $hover_image src='".$img_url."' alt='".$alt."' $class />";
    return $image;
}
add_shortcode( 'img', 'img_title_alt' );

function dumketo_content( $atts ){
    ob_start();
    global $dumketo, $front_page_id;  
    $column =  $atts['column'];
    $column_class = $atts['column_class'];
    $main_class = $atts['main_class'];
    $title = $atts['title'];
?>
    <div class="col col-lg-<?php echo $column; ?> <?php echo $column_class; ?>">
        <div class="footer-content-details">            
            <?php echo wpautop( $dumketo['footer_content'] ); ?>
            <?php echo do_shortcode('[dumketo_social_links column="" column_class="" title="FOLLOW US" align_class="justify-content-start" position ="top"]'); ?>    
        </div>   
    </div>
    <?php
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_content', 'dumketo_content' );

function dumketo_menu( $atts ){
    ob_start();
    global $dumketo, $front_page_id;  
    $column =  $atts['column'];
    $column_class = $atts['column_class'];
    $main_class = $atts['main_class'];
    $title = $atts['title'];
    $content = $atts['content'];
?>
    <div class="col col-lg-<?php echo $column; ?> <?php echo $column_class; ?>">
        <?php if( $title ): ?>
            <div class="footer-media media align-items-center justify-content-center">
                <div class="media-body">
                    <h2><?php echo $title; ?></h2>
                    <div class="spacer"></div>
                </div>
            </div> 
        <?php endif; ?>
        <div class="<?php echo $main_class; ?>">
            <?php 
            $menu_id = sanitize_title($atts['menu']);            
            $menu_locations = wp_get_nav_menu_object( $menu_id );
            if ( $menu_locations ):
                wp_nav_menu( array(
                    'menu'              => $menu_locations->slug,
                    'theme_location'    => $menu_locations->slug,
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker()
                ));
            endif; ?>
        </div>
        <?php if( $content == 1 ): ?>
            <div class="footer-content-details">            
                <?php echo wpautop( $dumketo['footer_content'] ); ?>       
            </div> 
        <?php endif; ?>
    </div>
    <?php
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_menu', 'dumketo_menu' );

function dumketo_hours( $atts ){
    ob_start();
    global $dumketo, $front_page_id;  ?>
    <div class="col-sm-12 col-lg-<?php echo $atts['column']; ?>">
        <?php if( isset( $atts['title'] ) ): ?>
            <div class="footer-media media align-items-center justify-content-center mh-0 pt-4 mb-3">
                <div class="media-body">
                    <h2><?php echo $atts['title']; ?></h2>
                    <div class="spacer"></div>
                </div>
            </div> 
        <?php endif; ?>
        <?php if( $dumketo['basic_info']['business_hour'] ){ ?>
            <div class="opening-hour">
                <?php echo wpautop( $dumketo['basic_info']['business_hour'] ); ?>
            </div>
        <?php } ?>
    </div>
    <?php
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_hours', 'dumketo_hours' );

function dumketo_copyright( $atts ){
    ob_start();
    global $dumketo, $front_page_id; 
    $font_weight = $atts['font_weight']; ?>
        <div class="col col-6 align-self-center">
            <p id="copyright">&copy <?php echo date( "Y"); ?> <?php bloginfo( 'name' ); ?>. All Right Reserved.</p>
        </div>
        <div class="col col-6 align-self-center">
            <p id="copyright" class="d-flex justify-content-end"><?php echo $dumketo['company_text'] ?></p>
        </div>
    <?php
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_copyright', 'dumketo_copyright' );