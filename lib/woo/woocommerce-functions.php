<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'biagiotti_mikado_is_yith_clv_installed' ) ) {
	function biagiotti_mikado_is_yith_clv_installed() {
		return defined( 'YITH_WCCL' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_yith_wcqv_installed' ) ) {
	function biagiotti_mikado_is_yith_wcqv_installed() {
		return defined( 'YITH_WCQV' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_yith_wcwl_installed' ) ) {
	function biagiotti_mikado_is_yith_wcwl_installed() {
		return defined( 'YITH_WCWL' );
	}
}

if ( !function_exists( 'biagiotti_mikado_get_woocommerce_sale' ) ) {
	function biagiotti_mikado_get_woocommerce_sale( $product ) {
		$enable_percent_mark = 'yes';
		$price               = intval( $product->get_regular_price() );
		$sale_price          = intval( $product->get_sale_price() );
		
		if ( $price > 0 && $enable_percent_mark === 'yes' ) {
			return '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			return esc_html__( 'Sale', 'biagiotti' );
		}
	}
}