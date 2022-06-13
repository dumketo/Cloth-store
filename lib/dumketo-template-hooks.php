<?php
/**
 *
 * Dumketo Template hooks
 * @package Dumketo
 *
 */

/*----------------------------------------------------------------------------------------------------*/

/**
 *
 * Theme : Dumketo
 * 404 Properties
 *
**/
add_action( '404', 'dumketo_404' );

/**
 *
 * Theme : Dumketo
 * Header Portion Properties
 *
**/
add_action( 'dumketo_header', 'dumketo_header_part' );

/**
 *
 * Theme : Dumketo
 * TopBar Information
 *
**/

//add_action( 'dumketo_top_header', 'dumketo_top_email', 10 );
//add_action( 'dumketo_top_header', 'dumketo_top_phone', 20 );
//add_action( 'dumketo_top_header', 'dumketo_top_logo', 10 );
add_action( 'dumketo_top_header', 'dumketo_top_part', 20 );

/**
 *
 * Theme : Dumketo
 * Secondary Top Information
 *
**/

add_action( 'dumketo_second_header', 'dumketo_top_main_menu', 10 );
//add_action( 'dumketo_mobile_header', 'dumketo_mobile_logo', 10 );
add_action( 'dumketo_banner_end', 'dumketo_order_online' );

/**
 *
 * Theme : Dumketo
 * Front Page Properties
 *
**/

add_action( 'dumketo_frontpage', 'dumketo_frontpage');


/**
 *
 * Theme : Dumketo
 * Inner Page Properties
 *
**/

add_action( 'dumketo_product', 'dumketo_product' );
add_action( 'dumketo_inner_heading', 'dumketo_inner_heading' );
//add_action( 'dumketo_inner_page', 'dumketo_inner_page_content_before', 10 );
add_action( 'dumketo_inner_page', 'dumketo_inner_page_content', 20 );
add_action( 'dumketo_inner_page', 'dumketo_inner_page_extra_content', 30 );
//add_action( 'dumketo_inner_page', 'dumketo_inner_page_content_end', 40 );
//add_action( 'dumketo_inner_page_sidebar', 'dumketo_inner_page_sidebar' );
add_action( 'dumketo_inner_footer_part', 'dumketo_inner_footer_part' );

/**
 *
 * Theme : Dumketo
 * Footer Section Information
 *
**/
//add_action( 'dumketo_footer_widgets', 'dumketo_footer_contact_title', 10 );

add_action( 'dumketo_footer_widgets', 'dumketo_footer_contact_info', 10 );
//add_action( 'dumketo_footer_social_widgets', 'dumketo_footer_social_info', 10 );


/**
 *
 * Theme : Dumketo
 * Footer Site Credit
 *
**/



/**
 *
 * Theme : Dumketo
 * Contact page Properties
 *
**/

add_action( 'dumketo_contact_page', 'dumketo_contact_page_content', 10 );
add_action( 'dumketo_contact_page', 'dumketo_contact_info', 20 );
//add_action( 'dumketo_contact_page', 'dumketo_contact_form', 30 );
add_action( 'dumketo_contact_footer_part', 'dumketo_contact_footer_part' );



/**
 *
 * Theme : Dumketo
 * Blog page Properties
 *
**/

add_action( 'dumketo_blog_heading', 'dumketo_blog_page_heading' );
add_action( 'dumketo_blog_page', 'dumketo_blog_page_content' );
add_action( 'dumketo_blog_footer_part', 'dumketo_blog_footer_part' );


add_action( 'dumketo_team_footer_part', 'dumketo_team_footer_part' );


