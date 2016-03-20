<?php


add_action('wp_enqueue_scripts','load_libraries_js');

if(is_product_category()){
	//Thêm file javascript vào product category
	add_action('wp_enqueue_scripts','load_product_category_js');
}

if(is_product()){
	// Sắp xếp lại thứ tự các tab trong trang sản phẩm
	add_filter( 'woocommerce_product_tabs', 'hd_rearrange_tabs', 98);
}


add_filter('widget_text', 'do_shortcode');
