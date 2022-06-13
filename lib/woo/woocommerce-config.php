<?php
/*************** PRODUCT LISTS FILTERS - begin ***************/

	add_action( 'woocommerce_before_shop_loop', 'biagiotti_mikado_pl_controls_before', 19 );
	add_action( 'woocommerce_before_shop_loop', 'biagiotti_mikado_pl_controls_after', 31 );

	//Add additional html tags around product lists
	add_action( 'woocommerce_before_shop_loop', 'biagiotti_mikado_pl_holder_additional_tag_before', 35 );
	add_action( 'woocommerce_after_shop_loop', 'biagiotti_mikado_pl_holder_additional_tag_after', 5 );
	
	//Add additional html tag around product elements
	add_action( 'woocommerce_before_shop_loop_item', 'biagiotti_mikado_pl_inner_additional_tag_before', 5 );
	
	//Remove open and close link position
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	
	//Add additional html tags around image and marks
	add_action( 'woocommerce_before_shop_loop_item_title', 'biagiotti_mikado_pl_image_additional_tag_before', 5 );
	add_action( 'biagiotti_mikado_action_woo_pl_info_below_image', 'biagiotti_mikado_pl_image_additional_tag_after', 6 );
	add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_image_additional_tag_after', 1 );

	/*************** Product Info Position Is On Image Hover ***************/
	
		//Add additional html tag around product elements
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_open', 20 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_close', 21 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_inner_additional_tag_after', 22 );
		
		//Add additional html around product info elements
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_inner_text_additional_tag_before', 5 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_inner_text_additional_tag_after', 17 );

		// Add To Cart
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_action_buttons_tag_before', 12 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_add_to_cart', 13 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_action_buttons_tag_after', 16 );


		// Add additional html at the end of product info elements
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_text_wrapper_additional_tag_before', 22 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_text_wrapper_additional_tag_after', 30 );
		
		// Title
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_woocommerce_template_loop_product_title', 23 );

		// Categories
		//add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_woocommerce_template_loop_product_categories', 24 );

		// Price
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_price', 25 );

		// Star Rating
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		// add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_rating_additional_tag_before', 26 );
		// add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_rating', 27 );
		// add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_pl_rating_additional_tag_after', 28 );

/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

	//Add additional html around single product summary and images
	add_action( 'woocommerce_before_single_product_summary', 'biagiotti_mikado_single_product_content_additional_tag_before', 5 );
	add_action( 'woocommerce_after_single_product_summary', 'biagiotti_mikado_single_product_content_additional_tag_after', 6 );
	
	//Add additional html around single product summary
	add_action( 'woocommerce_before_single_product_summary', 'biagiotti_mikado_single_product_summary_additional_tag_before', 30 );
	add_action( 'woocommerce_after_single_product_summary', 'biagiotti_mikado_single_product_summary_additional_tag_after', 5 );

	//Change sale mark position
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 20 );
	
	//Change title position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'biagiotti_mikado_woocommerce_template_single_title', 5 );
	
	//Change price position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 8 );

/*************** PRODUCT SINGLE FILTERS - end ***************/