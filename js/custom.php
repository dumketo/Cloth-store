<?php
add_action ( 'wp_footer', 'dynamic_js', 99 );
function dynamic_js() {
    global $dumketo;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($)  {
            <?php if( isset($dumketo['readmore_line']) ? $dumketo['readmore_line'] : '' ) : ?>
                jQuery('.jrm-truncate').readMore({ showLines: <?php echo $dumketo['readmore_line']; ?>, linking: true, linkCaption: 'Read More', linkCloseCaption: 'Close', linkHint:"", animationSpeed:800 });
            <?php endif; ?>
            <?php if( $dumketo["banner-option"]==2 ) { ?>
                $('.flexslider').flexslider( { animation: "<?php echo $dumketo['slider_animation']; ?>", easing: "swing", direction: "<?php echo $dumketo['slider_direction']; ?>", slideshow: <?php echo $dumketo['slider_slideshow']; ?>, slideshowSpeed: "<?php echo $dumketo['slider_interval']; ?>", pauseOnHover: true, controlNav: "<?php echo $dumketo['slider_controlnav']; ?>", directionNav: "<?php echo $dumketo['slider_directionnav']; ?>" } );
            <?php } ?>
            <?php if( $dumketo["content-show-option"]==3 ) : ?>
                $('.open-popup-link').magnificPopup({ type: 'inline', midClick: true, mainClass: 'mfp-fade' });
            <?php endif; ?>
            <?php if( $dumketo["main_nav_sticky"]==1 ) : ?>
                $("#head-section").sticky({ topSpacing:0, zIndex:9999999999 });
            <?php endif; ?>
        });
    </script>
<?php } ?>
