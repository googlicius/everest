<?php


if( !function_exists('get_product_from_layerednav') ){
	function get_product_from_layerednav(){
		hd_debug(json_decode(stripslashes($_POST['filter'])),"filename","a");
		ob_start();

		echo stripslashes($_POST['filter']);

		$contents = ob_get_clean();
		echo $contents;
		exit;
	}
}