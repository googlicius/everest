<?php

//Thêm file javascript vào product category
if ( ! function_exists( 'load_product_category_js' ) ) {
	function load_product_category_js(){
		wp_enqueue_script( 'static',get_stylesheet_directory_uri() . '/woocommerce/js/statics.js' );
		wp_enqueue_script( 'child-woocommerce-script',get_stylesheet_directory_uri() . '/woocommerce/js/woo-category-js.js' );
		//Get site_URL for javascript
		wp_localize_script('static', 'WOO', array( 'ajaxurl' => admin_url('ajax-admin.php'), 'siteurl' => get_option('siteurl') ));
		wp_localize_script('child-woocommerce-script', 'WOO', array( 'ajaxurl' => admin_url('admin-ajax.php'), 'siteurl' => get_option('siteurl') ));
		wp_enqueue_script('static');
		wp_enqueue_script('child-woocommerce-script');
	}
}

// Thêm các thư viện JS
if(!function_exists('load_libraries_js')){
	function load_libraries_js(){
		wp_enqueue_script('nicescroll', get_stylesheet_directory_uri() . '/assets/js/jquery.nicescroll/jquery.nicescroll.min.js');
		wp_enqueue_script('pjax', get_stylesheet_directory_uri() . '/assets/js/jquery.pjax.js');
	}
}

// Chỉnh lại thứ tự tab trong trang sản phẩm
if( ! function_exists('hd_rearrange_tabs') ){
	function hd_rearrange_tabs( $tabs = array() ){

		$tab_priority = array('additional_information' => 5, 'description' => 10 , 'related' => 15, 'reviews' => 20);

		foreach ($tab_priority as $key => $priority) {
			if( $tabs[$key] ){
				$tabs[$key]['priority'] = $priority;
			}
		}

		return $tabs;
	}
}