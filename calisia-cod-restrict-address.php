<?php
/**
 * Plugin Name: calisia-cod-restrict-address
 * Author: Tomasz Boroń
 * Text Domain: calisia-cod-restrict-address
 * Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

define('CALISIA_COD_RESTRICT_ADDRESS_ROOT', __DIR__);
define('CALISIA_COD_RESTRICT_ADDRESS_URL', plugin_dir_url( __FILE__ ));

require_once CALISIA_COD_RESTRICT_ADDRESS_ROOT . '/src/core/loader.php';
require_once CALISIA_COD_RESTRICT_ADDRESS_ROOT . '/src/core/translations.php';
require_once CALISIA_COD_RESTRICT_ADDRESS_ROOT . '/src/checkout.php';

//load js files in frontend
add_action('wp_enqueue_scripts', 'calisia_cod_restrict_address\loader::load_js', 19);

//check if cod (platnosc przy odbiorze) and other shipping address are filled
//if so invalidate the form and show error message
add_action('woocommerce_after_checkout_validation', 'calisia_cod_restrict_address\checkout::check_order');

//render javascript translations table
add_action('woocommerce_before_checkout_form', 'calisia_cod_restrict_address\checkout::js_checkout_msgs');

//load plugin textdomain
add_action( 'init', 'calisia_cod_restrict_address\translations::load_textdomain' );