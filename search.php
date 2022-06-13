<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
	
	<?php get_template_part( 'page-templates/home_part/banner', 'page' ); ?>
    <section class="about-banner">           
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <header class="page-header">
                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dumketo' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    </header><!-- .page-header -->
                    <section id="mp-products" class="hfeed mp_products mp_products-grid">
                        <?php global $post; ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', 'search' ); ?>
                        <?php endwhile; ?>
                    </section>
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <?php echo do_shortcode("[pagination]"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
