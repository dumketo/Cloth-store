<?php
if ( ! function_exists( 'biagiotti_mikado_set_single_product_thumbnails_size' ) ) {
	function biagiotti_mikado_set_single_product_thumbnails_size( $size ) {
		return apply_filters( 'biagiotti_mikado_filter_woocommerce_gallery_thumbnail_size', 'woocommerce_thumbnail' );
	}
	
	add_filter( 'woocommerce_gallery_thumbnail_size', 'biagiotti_mikado_set_single_product_thumbnails_size' );
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function biagiotti_mikado_woocommerce_template_loop_product_title() {
		$tag = 'h5';		
		the_title( '<' . $tag . ' class="mkdf-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_template_loop_product_categories' ) ) {
	/**
	 * Function that add product categories html
	 */
	function biagiotti_mikado_woocommerce_template_loop_product_categories() {

		global $product;

		if ( ! empty( $product ) ) {
			$categories = wc_get_product_category_list( $product->get_id(), ', ' );

			if ( ! empty( $categories ) ) { ?>
				<div class="mkdf-product-categories"><?php echo wp_kses_post( $categories ); ?></div>
			<?php }
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function biagiotti_mikado_woocommerce_template_single_title() {
		$tag = 'h1';
		the_title( '<' . $tag . '  itemprop="name" class="mkdf-single-product-title">', '</' . $tag . '>' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function biagiotti_mikado_woocommerce_sale_flash() {
		global $product;
		
		if ( ! empty( $product ) && $product->is_in_stock() ) {
			return '<span class="mkdf-onsale">' . biagiotti_mikado_get_woocommerce_sale( $product ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_sale_flash', 'biagiotti_mikado_woocommerce_sale_flash' );
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_product_out_of_stock' ) ) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function biagiotti_mikado_woocommerce_product_out_of_stock() {
		global $product;
		
		if ( ! $product->is_in_stock() ) {
			print '<span class="mkdf-sold">' . esc_html__( 'Sold', 'biagiotti' ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_product_thumbnails', 'biagiotti_mikado_woocommerce_product_out_of_stock', 20 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'biagiotti_mikado_woocommerce_product_out_of_stock', 10 );
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_new_flash' ) ) {
	/**
	 * Function for adding new flash template
	 *
	 * @return string
	 */
	function biagiotti_mikado_woocommerce_new_flash() {
		$new = get_post_meta( get_the_ID(), 'mkdf_show_new_sign_woo_meta', true );
		
		if ( $new === 'yes' ) {
			print '<span class="mkdf-new-product">' . esc_html__( 'New', 'biagiotti' ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_product_thumbnails', 'biagiotti_mikado_woocommerce_new_flash', 21 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'biagiotti_mikado_woocommerce_new_flash', 11 );
}

if ( ! function_exists( 'biagiotti_mikado_single_product_content_additional_tag_before' ) ) {
	function biagiotti_mikado_single_product_content_additional_tag_before() {
		
		print '<div class="mkdf-single-product-content">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_single_product_content_additional_tag_after' ) ) {
	function biagiotti_mikado_single_product_content_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_single_product_summary_additional_tag_before' ) ) {
	function biagiotti_mikado_single_product_summary_additional_tag_before() {
		
		print '<div class="mkdf-single-product-summary">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_single_product_summary_additional_tag_after' ) ) {
	function biagiotti_mikado_single_product_summary_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_controls_before' ) ) {
	function biagiotti_mikado_pl_controls_before() {

		print '<div class="mkdf-pl-controls-holder">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_controls_after' ) ) {
	function biagiotti_mikado_pl_controls_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_holder_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_holder_additional_tag_before() {
		
		print '<div class="mkdf-pl-main-holder">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_holder_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_holder_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_inner_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_inner_additional_tag_before() {
		
		print '<div class="mkdf-pl-inner">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_inner_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_inner_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_image_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_image_additional_tag_before() {
		
		print '<div class="mkdf-pl-image">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_image_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_image_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_inner_text_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_inner_text_additional_tag_before() {
		
		print '<div class="mkdf-pl-text"><div class="mkdf-pl-text-outer"><div class="mkdf-pl-text-inner"><div class="mkdf-pl-text-action">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_inner_text_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_inner_text_additional_tag_after() {
		
		print '</div></div></div></div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_action_buttons_tag_before' ) ) {
	function biagiotti_mikado_pl_action_buttons_tag_before() {

		print '<div class="mkdf-pl-action-buttons-holder">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_action_buttons_tag_after' ) ) {
	function biagiotti_mikado_pl_action_buttons_tag_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_text_wrapper_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_text_wrapper_additional_tag_before() {
		
		print '<div class="mkdf-pl-text-wrapper">';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_text_wrapper_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_text_wrapper_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_rating_additional_tag_before' ) ) {
	function biagiotti_mikado_pl_rating_additional_tag_before() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '<div class="mkdf-pl-rating-holder">';
			}
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_pl_rating_additional_tag_after' ) ) {
	function biagiotti_mikado_pl_rating_additional_tag_after() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '</div>';
			}
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_single_product_title' ) ) {
	/**
	 * Function that checks option for single product title and overrides it with filter
	 */
	function biagiotti_mikado_woocommerce_single_product_title( $show_title_area ) {
		if ( is_singular( 'product' ) ) {
			$woo_title_meta = get_post_meta( get_the_ID(), 'mkdf_show_title_area_woo_meta', true );
			
			if ( empty( $woo_title_meta ) ) {
				$woo_title_main = biagiotti_mikado_options()->getOptionValue( 'show_title_area_woo' );
				
				if ( ! empty( $woo_title_main ) ) {
					$show_title_area = $woo_title_main == 'yes';
				}
			} else {
				$show_title_area = $woo_title_meta == 'yes';
			}
		}
		
		return $show_title_area;
	}
	
	add_filter( 'biagiotti_mikado_filter_show_title_area', 'biagiotti_mikado_woocommerce_single_product_title' );
}

if ( ! function_exists( 'biagiotti_mikado_set_title_text_output_for_woocommerce' ) ) {
	function biagiotti_mikado_set_title_text_output_for_woocommerce( $title ) {
		
		if ( biagiotti_mikado_is_woo_archive_page() ) {
			global $wp_query;
			
			$tax            = $wp_query->get_queried_object();
			$category_title = $tax->name;
			$title          = $category_title;
		} elseif ( biagiotti_mikado_is_woocommerce_shop() ) {
			$shop_id = biagiotti_mikado_get_woo_shop_page_id();
			$title   = $shop_id !== -1 ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'biagiotti' );
		}
		
		return $title;
	}
	
	add_filter( 'biagiotti_mikado_filter_title_text', 'biagiotti_mikado_set_title_text_output_for_woocommerce' );
}