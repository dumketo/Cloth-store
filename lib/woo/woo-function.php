<?php
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}

function dumketo_sidebar( $atts ){
    ob_start();
		if ( is_active_sidebar( 'sidebar-page' ) ) : dynamic_sidebar( 'sidebar-page' ); endif;
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_sidebar', 'dumketo_sidebar' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}


/**
 * products per row
**/
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
/**
 * Change number of related products output
**/ 
function woo_related_products_limit() {
  global $product;
    $args['posts_per_page'] = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'woo_related_products_args', 20 );
  function woo_related_products_args( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}


/**
 * Mini Cart
**/
/**
 * Mini Cart
**/
function woo_cart_link_fragments( $fragments ) { 
    ob_start();    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url(); ?>
        <span class="cart-count">
            <?php if ( $cart_count > 0 ) { ?> <span class="cart-contents-count"><?php echo $cart_count; ?></span> <?php } ?>
        </span>             
    <?php $fragments['.cart-count'] = ob_get_clean();     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_link_fragments' );

function woo_cart_link() {
    ob_start(); 
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url(); ?>
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
            <span class="cart-count">
                <?php if ( $cart_count > 0 ) { ?> <span class="cart-contents-count"><?php echo $cart_count; ?></span> <?php } ?>
            </span> 
        </a>
    <?php           
    return ob_get_clean(); 
}
add_shortcode( "woo_cart_link", "woo_cart_link" );

function woocommerce_header_cart() {
    if ( is_cart() ) { $class = 'current-menu-item'; } else {$class = ''; }
    if ( $show_account ) : 
        echo '<a class="header-item wc-account-link" href="' . esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) . '" title="' . esc_html__( 'Your account', 'botiga' ) . '"><i class="ws-svg-icon">' . botiga_get_svg_icon( 'icon-user', false ) . '</i></a>'; ?>
    <?php endif; ?> 
    <div id="site-header-cart" class="site-header-cart header-item">
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php echo woo_cart_link(); ?>
        </div>
        <?php $instance = array( 'title' => esc_html__( 'Your Cart', 'dumketo' ), );
        the_widget( 'WC_Widget_Cart', $instance ); ?>
    </div>
    <?php
}
add_shortcode ('woo_cart_mobile', 'woo_cart_mobile' );
function woo_cart_mobile() {
    ob_start(); 
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url(); ?>
    <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
        <?php if ( $cart_count > 0 ) { ?> 
            <span class="cart-contents-count-mobile"><?php echo $cart_count; ?></span> 
        <?php } ?>
    </a>
    <?php           
    return ob_get_clean(); 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_mobile_fragments' );
function woo_cart_mobile_fragments( $fragments ) { 
    ob_start();   
    $cart_count = WC()->cart->cart_contents_count; ?>
    <span class="cart-contents-count-mobile"><?php echo $cart_count; ?></span> 
    <?php $fragments['.cart-contents-count-mobile'] = ob_get_clean();     
    return $fragments;
}

add_shortcode ('woo_delivery', 'woo_delivery' );
function woo_delivery() {
    ob_start();
    $cart_total = WC()->cart->get_cart_total();
    $cart_url = wc_get_cart_url(); ?> 
        <a href="<?php echo $cart_url; ?>" class="price-total"> <?php echo $cart_total; ?> </a>
    <?php return ob_get_clean();
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_delivery_fragments' );
function woo_delivery_fragments( $fragments ) { 
    ob_start();   
    $cart_count = WC()->cart->cart_contents_count; 
    $cart_total = WC()->cart->get_cart_total();
    $cart_url = wc_get_cart_url(); ?>
        <a href="<?php echo $cart_url; ?>" class="price-total"> <?php echo $cart_total; ?> </a>
    <?php $fragments['a.price-total'] = ob_get_clean();     
    return $fragments;
}

add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
    global $product;
    if ( $product->is_type( 'variable' ) ) {
        $text = $product->is_purchasable() ? __( 'Add to Cart', 'woocommerce' ) : __( 'Add to Cart', 'woocommerce' );
    }
    return $text;
}, 10 );