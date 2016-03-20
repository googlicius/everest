<?php

/** by haidang009 */

add_action('widgets_init', 'get_sale_products_widget');

if( ! function_exists('get_sale_products_widget') ){
	function get_sale_products_widget(){
		register_widget('Flatsomechild_Get_Sale_Products_Widget');
	}
}

class Flatsomechild_Get_Sale_Products_Widget extends WC_Widget{

	public function __construct(){
		$this->widget_cssclass = 'woocommerce widget_products_on_sale_for_this_category';
		$this->widget_description = __( 'Display a list of sale products in current category.', 'flatsome-child' );
		$this->widget_id = 'woocommerce_sale_products_this_category';
		$this->widget_name        = __( 'WooCommerce Products On Sale', 'flatsome-child' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Products On Sale', 'flatsome-child' ),
				'label' => __( 'Title', 'flatsome-child' )
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 10,
				'label' => __( 'Number of products to show', 'flatsome-child' )
			)
		);

		parent::__construct();
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ){
		global $product, $woocommerce;

		/* Disable if not on product page */
		if(!is_product()) return;

		ob_start();

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		$meta_query = $woocommerce->query->get_meta_query();

		// Get categories of this product
		$categories = get_the_terms($product->ID, 'product_cat');
		
		// Meta query to get sale product (simple or variation)
		$my_meta_query = array(
			array(
				'relation' => 'OR',
				array(
					'key' => '_sale_price',
					'value' => 0,
					'compare' => '>',
					'type' => 'numberic'
				),
				array(
					'key' => '_min_variation_sale_price',
					'value' => 0,
					'compare' => '>',
					'type' => 'numberic'
				)
			)
		);

		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

		$args = array(
			'post_type' => 'product',
			'product_cat' => $categories[0]->slug,
			'orderby' => 'rand',
			'posts_per_page' => $number,
			'ignore_sticky_posts' => 1,
			'post__not_in' => array( $product->id ),
			'meta_query' => array_merge($meta_query, $my_meta_query)
		);
		$products = new WP_Query( $args );

		if ($products->have_posts()) {
			echo $before_widget;

			if ( ! empty( $title ) )
				echo $before_title . $title . $after_title;

			echo '<ul class="product_list_widget">';
			while ( $products->have_posts() ) {
				$products->the_post();
				wc_get_template( 'content-widget-product.php' );
			}
			echo '</ul>';
			
			echo $after_widget;
		}
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		$content = ob_get_clean();
		echo $content;
	}
}