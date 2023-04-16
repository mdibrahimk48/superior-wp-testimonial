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
 * Enqueue Styles of this Plugin
 */

function spwptm_enqueue_styles() {
	wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css' );
	wp_enqueue_style( 'testimonial-css', plugins_url( 'css/testimonial.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'spwptm_enqueue_styles' );

 
?>