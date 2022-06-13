<?php 
function dumketo_social_links( $atts ){
    ob_start();
    global $dumketo, $front_page_id; 
    $column =  $atts['column'];
    $column_class = $atts['column_class'];
    $alignment = $atts['align_class']; 
    $position = $atts['position']; 
    $hours = $atts['hours'];?>
    <?php if($column): ?><div class="col-md-<?php echo $column; ?> <?php echo $column_class; ?>"> <?php endif; ?>
        <?php if( $atts['title'] ): ?>
            <div class="footer-media media align-items-center justify-content-center">
                <div class="media-body">
                    <h2><?php echo $atts['title']; ?></h2>
                    <div class="spacer"></div>
                </div>                
            </div> 
        <?php endif; ?>
        <?php if($dumketo['social_profiles']): ?>
            <div class="d-flex <?php echo $alignment; ?>">
                <?php foreach($dumketo['social_profiles'] as $key => $social_profile) { ?>        
                    <?php if( $social_profile['profilelink'] ) { $title = $social_profile['title']; 
                        $icon = $social_profile['profile_icon']; 
                        $image = $social_profile['profile_image']["url"];
                        $image_top = $social_profile['profile_image_top']["url"];
                        $image_top_hover = $social_profile['profile_image_top_hover']["url"];
                        $image_hover = $social_profile['profile_image_hover']["url"];
                        $alt = $social_profile['profile_image']["title"]; ?>
                        <div class="social-link-<?php echo $position; ?> <?php if( $key == ( count( $dumketo['social_profiles'] ) - 1 ) ) echo 'last'; ?>">
                            <a target="_blank" href="<?php echo $social_profile['profilelink']; ?>" class="<?php echo $title; ?>"> 
                                <?php if( $social_profile['social_profile_im'] == 'icon' ){
                                    echo '<i class="'.$icon.'"></i>';
                                }else{
                                    if( $position == 'top' ): ?>
                                        <img <?php if($image_top_hover){ ?> data-hover-src="<?php echo $image_top_hover; ?>" <?php } ?> src="<?php echo $image_top; ?>" alt="<?php echo $alt; ?>" class="img-fluid">
                                    <?php else: ?>
                                        <img <?php if($image_hover){ ?> data-hover-src="<?php echo $image_hover; ?>" <?php } ?> src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="img-fluid">
                                    <?php endif; ?>  
                                <?php } ?>                                
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if( $hours == 1 ): ?>
            <div class="row">
                <?php echo do_shortcode('[dumketo_hours column="" column_class="" title="Business Hours"]'); ?> 
            </div>
        <?php endif; ?>
    <?php if($column): ?></div><?php endif; ?>
    <?php $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_social_links', 'dumketo_social_links' );