<?php

/*
Plugin Name: Chapman WPBakery RSS Carousel
Plugin URI: https://github.com/chapmanu/newsroom
Description: An extension for WPBakery RSS Carousel
Author: Nick Nadel
Version: 1.2.0
Author URI: https://github.com/chapmanu/newsroom
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}


// Before VC Init

add_action( 'vc_before_init', 'wpc_vc_before_init_actions' );

function wpc_vc_before_init_actions() {

// Require new custom Element

include( plugin_dir_path( __FILE__ ) . 'vc-cu-rss.php');


}


function wpc_community_directory_scripts() {
	// wp_enqueue_style( 'wpc_community_directory_stylesheet',  plugin_dir_url( __FILE__ ) . 'styles/vc-cu-rss.css' );
	// wp_enqueue_style( 'styles', plugin_dir_url( __FILE__ ) .'styles/vc-cu-rss.css', array(), '1.1', 'all' );
     wp_enqueue_style('vc_cu_rss_style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
     wp_enqueue_script('jquery');
     wp_enqueue_style('vc_cu_owl_style', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css' );
     wp_enqueue_style('vc_cu_owl_theme', plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.css' );
     wp_enqueue_script('vc_cu_rss_scripts', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js' );
     wp_enqueue_script('vc_cu_rss_js', plugin_dir_url( __FILE__ ) . 'js/vc-cu-rss.js' );
}
add_action( 'wp_enqueue_scripts', 'wpc_community_directory_scripts' );

