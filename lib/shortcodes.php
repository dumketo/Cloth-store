<?php
include_once('shortcode/basic.php');
include_once('shortcode/contact-us.php');
include_once('shortcode/social.php');
include_once('shortcode/blog.php');
include_once('shortcode/block.php');
include_once('shortcode/products.php');
include_once('shortcode/search.php');


function client_logo(){
    ob_start();
    global $dumketo, $front_page_id;
    $home_meta = get_post_meta( $front_page_id, '_home_meta_options', 1 ); ?>
    <div id="client-logo" class="clients-logo owl-carousel wow flipInX">
        <?php 
        $client_logo_image = explode( ",", $home_meta['client_logo_image'] );
        foreach( $client_logo_image as $galleryID ):            
            $alt_text = get_the_title( $galleryID );?>
            <div class="item">
                <?php echo wp_get_attachment_image( $galleryID, 'full', false, array( "class" => "img-fluid gal-img mx-auto d-block" ) ); ?>                           
            </div>                      
        <?php endforeach; ?>                    
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
            $("#client-logo").owlCarousel({     
                autoplay:true,
                autoplayTimeout:<?php echo $home_meta['slider_interval'] ?>,
                autoplayHoverPause:true,
                loop:true,
                responsiveClass:true,
                responsive:{
                    0   :{ items:2 },
                    600 :{ items:2 },
                    1000:{ items:<?php echo $home_meta['slider_item'] ?> }
                },
                lazyLoad: true,
                nav: true,
                navText:[ ],
                margin:20,
                smartSpeed:450,
                dots: false,
                dotsData:false,
            });     
        });
    </script>

<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'client_logo', 'client_logo' );