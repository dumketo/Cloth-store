<?php
/**
 * Template Name: Home Page Template
**/
get_header(); ?> 

<?php
/**
 *
 * @hooked dumketo_inner_heading  - 10
 *
**/
do_action( 'dumketo_frontpage' ); 
?>    
<?php get_footer(); ?>