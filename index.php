<?php
/**
* The main template file
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
<?php   
/**
 *
 * @hooked dumketo_blog_page  - 10
 *
**/
do_action( 'dumketo_blog_page' ); 

/**
 *
 * @hooked dumketo_blog_footer_part  - 10
 *
**/
do_action( 'dumketo_blog_footer_part' ); 
?>
    
<?php get_footer() ?>