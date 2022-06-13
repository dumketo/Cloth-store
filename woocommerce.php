<?php
/**
 * The template for Woocoomerce
**/
get_header(); 
global $dumketo;
$pageID = get_the_ID();
$page = get_post($pageID);
$title = $page->post_name; ?>   
    <section class="inner-banner-section inner-product-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="inner-banner-title">
                        <?php if( is_shop() ): ?> 
                            <h1 class="wow zoomInDown">Shop</h1> 
                        <?php else: ?>
                            <h1 class="wow zoomInDown mb-0"><?php echo is_page() || is_single() ? get_the_title() : get_the_title( get_option('page_for_posts', true) ) ?></h1>
                        <?php endif; ?>
                    </div>                       
                </div>
            </div>
        </div>
    </section>
    <section class="inner-product-section py-5">
        <?php if( is_shop() ) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-sidebar mb-5">
                            <?php if ( is_active_sidebar( 'sidebar-page' ) ) : dynamic_sidebar( 'sidebar-page' ); endif; ?>
                        </div> 
                    </div>
                    <div class="col-lg-9">
                        <div class="woocommerce">
                            <?php if ( have_posts() ) : 
                                woocommerce_content(); 
                            endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="woocommerce">
                            <?php if ( have_posts() ) : 
                                woocommerce_content(); 
                            endif; wp_reset_postdata();  ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>                   
    </section>            
    <?php echo dumketo_get_reusable_block( 196 ); ?>  
	<?php get_template_part( 'template-parts/home_part/footer-contact' ); ?>   

<?php get_footer(); ?>