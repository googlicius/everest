<?php

// Thêm action xử lí lấy sản phẩm cho bộ lọc qua ajax
add_action('wp_ajax_get_product_from_layerednav', 'get_product_from_layerednav');
add_action('wp_ajax_nopriv_get_product_from_layerednav', 'get_product_from_layerednav');