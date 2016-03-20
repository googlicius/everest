<?php

/*
 * function to get child theme (this theme) directory
 */
function get_childtheme_template_directory(){
	return get_stylesheet_directory();
}


/**
 * Initialize all the things.
 */
require get_childtheme_template_directory() . '/inc/init.php';