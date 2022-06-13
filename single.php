<?php
/**
 * The Template for displaying all single posts
**/
global $dumketo;
get_header();
$url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?> 
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
<section class="about-banner">	
    <div class="container">
        <div class="row">
            <?php echo $dumketo["blog_single_page_sidebar"]==1 ? '<div class="col-lg-9">' : '<div class="col-lg-12">'; ?>
                <?php while ( have_posts() ) : the_post(); $title = get_the_title();?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php if ( $dumketo["blog_single_page_sidebar"] == 1 ): ?>
                <div class="col-sm-12 col-lg-3">
                    <?php get_sidebar(); ?>
                </div> 
            <?php endif; ?>

            <?php if ( $dumketo['activate_single_page_pagination'] == 1 ): ?>
                <div class="col-lg-12">
                    <nav class="nav-single">
                        <h3 class="assistive-text"><?php _e( 'Post navigation', 'dumketo' ); ?></h3>
                        <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'dumketo' ) . '</span> %title' ); ?></span>
                        <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'dumketo' ) . '</span>' ); ?></span>
                    </nav>
                </div> 
            <?php endif; ?>    
        </div>
    </div>
</section>
<?php echo dumketo_get_reusable_block( 196 ); ?>
<?php get_template_part( 'template-parts/home_part/footer-contact' ); ?>
<?php get_footer(); ?>