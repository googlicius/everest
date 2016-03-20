<?php

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function hd_debug($data,$filename,$mode = "w"){
		$debug = var_export($data,true);
		$file = fopen("C:/Vtiger_logs/$filename.txt",$mode);
		fwrite($file,"\n".$debug."\n");
		fclose($file);
	}
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}