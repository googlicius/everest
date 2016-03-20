<?php

load_theme_textdomain( 'flatsome-child', get_childtheme_template_directory() );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_childtheme_template_directory() . '/inc/functions/extras.php';


/**
 * Load WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	// widgets
	require get_childtheme_template_directory() . '/inc/widgets/get-sale-products.php';

	//Ajax
	if(defined('DOING_AJAX') && DOING_AJAX){
		require get_childtheme_template_directory() . '/inc/woocommerce/ajax-hooks.php';
		require get_childtheme_template_directory() . '/inc/woocommerce/ajax-functions.php';
	}

	// Front-end Only
	add_action('wp', 'init');
	function init(){
		// Only woocomerce pages: product_cat, product, cart, checkout.
		if(is_woocommerce()){
			require get_childtheme_template_directory() . '/inc/woocommerce/hooks.php';
			require get_childtheme_template_directory() . '/inc/woocommerce/functions.php';
		}
	}
}