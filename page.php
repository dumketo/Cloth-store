<?php
/**
 * The template for displaying all pages
**/
get_header(); 
global $dumketo;
$pageID = get_the_ID();
$page = get_post($pageID);
$title = $page->post_name; ?>
   
    <?php
    /**
     *
     * @hooked dumketo_inner_heading  - 10
     *
    **/
    do_action( 'dumketo_inner_heading' ); 
    ?> 
    <section class="position-relative inner-content-section inner-padding <?php echo $title; ?>">
        <?php
        while ( have_posts() ) : the_post(); 
            the_content();
        endwhile; wp_reset_query();
        ?>
    </section>
    
	<?php
    /**
     *
     * @hooked dumketo_inner_footer_part  - 10
     *
    **/
    do_action( 'dumketo_inner_footer_part', $title ); 
    ?>

<?php get_footer(); ?>