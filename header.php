<?php
/**
* The Header template for our theme
*
*/
global $dumketo; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top:0 !important;">
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
    <?php
    /**
     *
     * @hooked dumketo_inner_heading  - 10
     *
    **/
    do_action( 'dumketo_header' );
    ?>