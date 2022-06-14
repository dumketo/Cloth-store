<?php
function dumketo_product($atts){
    ob_start();
    global $dumketo, $front_page_id; 
    $cat = sanitize_title($atts['cat']); ?>
    <div id="product-slide" class="owl-carousel home-product-slide">
        <?php
        $cat = sanitize_title($atts['cat']);
        $part_args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'order' => 'DESC', );
        $loop = new WP_Query( $part_args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        global $product; 
        $title = get_the_title(); ?>
        <div class="home-product bg-white position-relative">
            <div class="mkdf-pl-inner">
                <div class="mkdf-pl-image">
                    <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="img-fluid d-block mx-auto" />
                </div>
                <div class="mkdf-pl-text">
                    <div class="mkdf-pl-text-outer">
                        <div class="mkdf-pl-text-inner">
                            <div class="mkdf-pl-text-action">
                                <div class="mkdf-pl-action-buttons-holder">
                                    <a href="?add-to-cart=<?php echo $product->id ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $product->id ?>" data-product_sku="" aria-label="Add <?php echo $title; ?> to your cart" rel="nofollow">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mkdf-pl-text-wrapper">
                <h5 class="mkdf-product-list-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
                <div class="mkdf-product-price">
                    <?php echo $product->get_price_html(); ?>
                </div>                
            </div>
            <a href="<?php echo get_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
        </div>
    <?php endwhile; ?>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
            $("#product-slide").owlCarousel({     
                autoplay:true,
                autoplayTimeout:50000,
                autoplayHoverPause:true,
                loop:true,
                responsiveClass:true,
                responsive:{
                    0   :{ items:1 },
                    600 :{ items:1 },
                    800 :{ items:2 },
                    1000:{ items:4 },
                    1200:{ items:4 }
                },
                lazyLoad: true,
                nav: false,
                navText:[ ],
                margin:20,
                smartSpeed:450,
                dots: true,
                dotsData:false,
            });     
        });
    </script>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'dumketo_product', 'dumketo_product' );


function dumketo_product_cat($atts){
    ob_start();
    global $dumketo, $front_page_id; 
    $cat = sanitize_title($atts['cat']); ?>
    <div id="product-<?php echo $cat ?>" class="owl-carousel home-product-slide">
        <?php
        $cat = sanitize_title($atts['cat']);
        $part_args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'order' => 'DESC', 'tax_query' => array( array( 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $cat, ), ), 'orderby' => 'meta_value_num', 'tax_query' => array( array( 'key' => 'total_sales', 'value' => 0, 'compare' => '>', ), ), );
        $loop = new WP_Query( $part_args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        global $product; ?>
        <div class="home-product bg-white position-relative">
            <div class="mkdf-pl-inner">
                <div class="mkdf-pl-image">
                    <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="img-fluid d-block mx-auto" />
                </div>
                <div class="mkdf-pl-text">
                    <div class="mkdf-pl-text-outer">
                        <div class="mkdf-pl-text-inner">
                            <div class="mkdf-pl-text-action">
                                <div class="mkdf-pl-action-buttons-holder">
                                    <a href="?add-to-cart=<?php echo $product->id ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $product->id ?>" data-product_sku="" aria-label="Add “Olaplex Nº 4 Bond Maintenance Shampoo” to your cart" rel="nofollow">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mkdf-pl-text-wrapper">
                <h5 class="mkdf-product-list-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
                <div class="mkdf-product-price">
                    <?php echo $product->get_price_html(); ?>
                </div>
            </div>
            <a href="<?php echo get_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
        </div>
    <?php endwhile; ?>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
            $("#product-<?php echo $cat ?>").owlCarousel({     
                autoplay:true,
                autoplayTimeout:50000,
                autoplayHoverPause:true,
                loop:true,
                responsiveClass:true,
                responsive:{
                    0   :{ items:1 },
                    600 :{ items:1 },
                    800 :{ items:2 },
                    1000:{ items:3 },
                    1200:{ items:3 }
                },
                lazyLoad: true,
                nav: false,
                navText:[ ],
                margin:0,
                smartSpeed:450,
                dots: true,
                dotsData:false,
            });     
        });
    </script>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'dumketo_product_cat', 'dumketo_product_cat' );


function dumketo_product_special($atts){
    ob_start();
    global $dumketo, $front_page_id; 
    $cat = sanitize_title($atts['cat']); ?>
    <div id="product-slide" class="owl-carouselw home-product-slide row">
        <?php
        $cat = sanitize_title($atts['cat']);
        $part_args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'order' => 'DESC', 'orderby' => 'popularity' );
        $loop = new WP_Query( $part_args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        global $product; 
        $title = get_the_title(); ?>
        <div class="col col-xl-4">
            <div class="home-special-product bg-white position-relative d-flex align-items-center">
                <div class="mkdf-pl-inner">
                    <div class="mkdf-pl-image">
                        <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="img-fluid d-block mx-auto" />
                    </div>
                    <div class="mkdf-pl-action-buttons-holder position-absolute">
                        <a href="?add-to-cart=<?php echo $product->id ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $product->id ?>" data-product_sku="" aria-label="Add <?php echo $title; ?> to your cart" rel="nofollow">Add to cart</a>
                    </div>
                </div>
                <div class="mkdf-pl-text-wrapper">
                    <h5 class="mkdf-product-list-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="mkdf-product-price">
                        <?php echo $product->get_price_html(); ?>
                    </div>                
                </div>
                <a href="<?php echo get_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
            </div>
        </div>
    <?php endwhile; ?>
    <!-- </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
            $("#product-slide").owlCarousel({     
                autoplay:true,
                autoplayTimeout:50000,
                autoplayHoverPause:true,
                loop:true,
                responsiveClass:true,
                responsive:{
                    0   :{ items:1 },
                    600 :{ items:1 },
                    800 :{ items:2 },
                    1000:{ items:4 },
                    1200:{ items:4 }
                },
                lazyLoad: true,
                nav: false,
                navText:[ ],
                margin:20,
                smartSpeed:450,
                dots: true,
                dotsData:false,
            });     
        });
    </script> -->
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'dumketo_product_special', 'dumketo_product_special' );
