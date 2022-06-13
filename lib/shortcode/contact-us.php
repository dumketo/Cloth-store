<?php 
function dumketo_get_touch( $atts ){
    ob_start();
    global $dumketo, $front_page_id;  
    $column =  $atts['column'];
    $column_class = $atts['column_class'];
    $title = $atts['title'];
    $title_class = $atts['title_class'];
    $address = $atts['address'];
    $phone = $atts['phone'];
    $email = $atts['email'];
    $hour = $atts['hour'];
    $social = $atts['social'];
    ?>
    <?php if($column): ?> <div class="col col-lg-6 col-xl-<?php echo $column; ?> <?php echo $column_class; ?>"> <?php endif; ?>
        <?php if( $title == 1 ): ?>
            <div class="footer-media media align-items-center justify-content-start">
                <?php if ($dumketo['footer_logo']['url']) : $logo = $dumketo["footer_logo"]["url"]; ?>
                    <a href='<?php echo esc_url(home_url('/')); ?>'>
                        <?php echo do_shortcode('[img img_name="' . $logo . '" format="" alt="Logo" class="img-fluid d-block logo"  ]') ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="footer-media media align-items-start justify-content-center">
                <div class="media-body">
                    <h2><?php echo $title; ?></h2>
                    <div class="spacer"></div>
                </div>
            </div> 
        <?php endif;
        if( $phone == '1' ): ?>
            <div class="media footer-phone footer-info pb-3 align-items-center">
                <?php echo do_shortcode('[img img_name="phone" format="png" alt="Phone" class="mr-3"  ]') ?>
                <div class="media-body">             
                    <a class="text-decoration-none font-weight-bold" href="tel:<?php echo str_replace(" ", "", $dumketo['basic_info']['phone']); ?>"><?php echo $dumketo['basic_info']['phone']; ?></a>
                </div>
            </div>
        <?php endif;
        if( $email == '1' ):  ?>
            <div class="media footer-email footer-info align-items-center pb-3">
                <?php echo do_shortcode('[img img_name="email" format="png" alt="E-mail" class="mr-3"  ]') ?>
                <div class="media-body">           
                    <a class="text-decoration-none " href="mailto:<?php echo $dumketo['basic_info']['email']; ?>"><?php echo $dumketo['basic_info']['email']; ?></a>
                </div>
            </div>
        <?php endif;
        if( $address == '1' ):  ?>        
            <div class="media footer-address footer-info pb-3 align-items-start">
                <?php echo do_shortcode('[img img_name="location" format="png" alt="Address" class="mr-3"  ]') ?>
                <div class="media-body">             
                    <a class="text-decoration-none " target="_blank" href="<?php echo $dumketo['basic_info']['map_link'] ?>"><?php echo $dumketo['basic_info']['address']; ?></a>
                </div>
            </div>
        <?php endif;        
        if( $hour == '1' ):  ?>        
            <div class="media footer-address footer-info pb-2 align-items-center">                
                <?php echo do_shortcode( '[img img_name="clockk-f" format="png" alt="Footer Address" class="mr-3"]' ); ?>                
                <div class="media-body">
                    <span class="text-white"><?php echo $dumketo['basic_info']['business_hour']; ?></span>
                </div>
            </div>
            <div class="<?php echo $main_class; ?>">
                <?php 
                $menu_id = 'footer-menu';            
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
        <?php endif;        
        if( $social =='1' ): ?>
            <div class="social-info pb-2 pt-4">
                <div class="d-flex footer-social flex-start align-self-center ">
                    <?php foreach($dumketo['social_profiles'] as $key => $social_profile) {
                        if( $social_profile['profilelink'] ) { $title = $social_profile['title']; 
                            $icon = $social_profile['profile_icon']; 
                            $image = $social_profile['profile_image']["url"];
                            $image_hover = $social_profile['profile_image_hover']["url"];
                            $alt = $social_profile['profile_image']["title"]; ?>
                            <div class="social-link mr-3 <?php if( $key == ( count( $dumketo['social_profiles'] ) - 1 ) ) echo 'last'; ?>">
                                <a target="_blank" href="<?php echo $social_profile['profilelink']; ?>" class="<?php echo $title; ?>"> 
                                    <?php if( $social_profile['social_profile_im'] == 'icon' ){
                                        echo '<i class="'.$icon.'"></i>';
                                    }else{ ?>
                                        <img <?php echo ($image_hover) ? "data-hover-src=$image_hover" : "" ?>  src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="img-fluid">
                                    <?php } ?>                                
                                </a>
                            </div>
                    <?php } } ?>
                </div>
            </div>
        <?php endif; ?>
    <?php if($column): ?></div> <?php endif; ?>
<?php
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_get_touch', 'dumketo_get_touch' );