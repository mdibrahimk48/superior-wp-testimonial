<?php

/*
 * Plugin Name:       Superior WP Testimonial
 * Plugin URI:        https://wordpress.org/plugins/superior-wp-testimonial/
 * Description:       Superior WP Testimonial is a plugin for displaying the client's review on the website.
 * Version:           1.0
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            Md. Ibrahim Khalil
 * Author URI:        https://www.ibrahimkhalil.xyz/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       spwptm
 */


/**
 * spwptm enqueue styles of this Plugin
 */

function spwptm_enqueue_styles() {
	wp_enqueue_style( 'spwptm-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css' );
	wp_enqueue_style( 'spwptm-owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css' );
	wp_enqueue_style( 'spwptm-style', plugins_url( 'css/spwptm_style.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'spwptm_enqueue_styles' );


/**
 * spwptm enqueue scripts of this Plugin
*/

function spwptm_enqueue_scripts() {
	wp_enqueue_script( 'spwptm-jquery-min', 'https://code.jquery.com/jquery-1.12.0.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'spwptm-owl-min', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'spwptm-script', plugins_url( 'js/spwptm_scripts.js', __FILE__), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'spwptm_enqueue_scripts' );


/**
 * Function - spwptm custom post type
*/
if ( ! function_exists('spwptm_custom_post_type') ) {

	// spwptm Register Custom Post Type
	function spwptm_custom_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Testimonials', 'Post Type General Name', 'spwptm' ),
			'singular_name'         => _x( 'Testimonial Type', 'Post Type Singular Name', 'spwptm' ),
			'menu_name'             => __( 'Testimonials', 'spwptm' ),
			'name_admin_bar'        => __( 'Post Type', 'spwptm' ),
			'archives'              => __( 'Item Archives', 'spwptm' ),
			'attributes'            => __( 'Item Attributes', 'spwptm' ),
			'parent_item_colon'     => __( 'Parent Item:', 'spwptm' ),
			'all_items'             => __( 'All Items', 'spwptm' ),
			'add_new_item'          => __( 'Add New Item', 'spwptm' ),
			'add_new'               => __( 'Add New', 'spwptm' ),
			'new_item'              => __( 'New Item', 'spwptm' ),
			'edit_item'             => __( 'Edit Item', 'spwptm' ),
			'update_item'           => __( 'Update Item', 'spwptm' ),
			'view_item'             => __( 'View Item', 'spwptm' ),
			'view_items'            => __( 'View Items', 'spwptm' ),
			'search_items'          => __( 'Search Item', 'spwptm' ),
			'not_found'             => __( 'Not found', 'spwptm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'spwptm' ),
			'featured_image'        => __( 'Featured Image', 'spwptm' ),
			'set_featured_image'    => __( 'Set featured image', 'spwptm' ),
			'remove_featured_image' => __( 'Remove featured image', 'spwptm' ),
			'use_featured_image'    => __( 'Use as featured image', 'spwptm' ),
			'insert_into_item'      => __( 'Insert into item', 'spwptm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'spwptm' ),
			'items_list'            => __( 'Items list', 'spwptm' ),
			'items_list_navigation' => __( 'Items list navigation', 'spwptm' ),
			'filter_items_list'     => __( 'Filter items list', 'spwptm' ),
		);
		$args = array(
			'label'                 => __( 'Testimonial Type', 'spwptm' ),
			'description'           => __( 'Testimonial Description', 'spwptm' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'menu_icon'             => 'dashicons-testimonial',
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'testimonial', $args );
	
	}
	add_action( 'init', 'spwptm_custom_post_type', 0 );
	
	}


?>