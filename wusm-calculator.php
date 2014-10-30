<?php
/*
Plugin Name: WUSM Calculator
Description: WUSM Financial Aid Calculator for estimating costs, inserted using shortcode [wusm_calculator]
Author: Sam Hermes
Version: 1.1
*/

require_once( dirname(__file__).'/php/custom_post_type.php' );
require_once( dirname(__file__).'/php/acf_fields.php' );

function wusm_enqueue_script() {
	wp_enqueue_style( 'cost', plugins_url('/css/cost.css', __FILE__) );
	wp_enqueue_script( 'cost-js', plugins_url('/js/cost.js', __FILE__), array( 'jquery' ), '0.1', true );
	wp_localize_script('cost-js', 'calclocation', array('calcurl' => plugins_url()));
	wp_enqueue_script( 'currency-js', plugins_url('/js/jquery.currency.js', __FILE__), array( 'jquery' ), '0.1', true );
	wp_enqueue_script( 'numeric-js', plugins_url('/js/jquery.numeric.js', __FILE__), array( 'jquery' ), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'wusm_enqueue_script' );

function wusm_calc_func( $atts ) {
	ob_start();
 	include( dirname(__file__).'/php/calculator_start.php' );
	$output = ob_get_clean();
	return $output;
}
add_shortcode( 'wusm_calculator', 'wusm_calc_func' );