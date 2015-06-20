<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:	PayPal Advanced Gateway For WooCommerce
 * Plugin URI:	http://webs-spider.com/
 * Description:	Paypal Advanced Gateway For WooCommerce Developed by an Certified PayPal Developer, official PayPal Partner.
 * Version:	1.3.2
 * Author:      johnwickjigo
 * Author URI:	http://www.mbjtechnolabs.com
 * License:     GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: paypal-advanced-gateway-for-woocommerce
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-paypal-advanced-gateway-for-woocommerce-activator.php
 */
function activate_paypal_advanced_gateway_for_woocommerce() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-paypal-advanced-gateway-for-woocommerce-activator.php';
    PayPal_Advanced_Gateway_For_WooCommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-paypal-advanced-gateway-for-woocommerce-deactivator.php
 */
function deactivate_paypal_advanced_gateway_for_woocommerce() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-paypal-advanced-gateway-for-woocommerce-deactivator.php';
    PayPal_Advanced_Gateway_For_WooCommerce_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_paypal_advanced_gateway_for_woocommerce');
register_deactivation_hook(__FILE__, 'deactivate_paypal_advanced_gateway_for_woocommerce');

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-paypal-advanced-gateway-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_paypal_advanced_gateway_for_woocommerce() {

    $plugin = new PayPal_Advanced_Gateway_For_WooCommerce();
    $plugin->run();
}

run_paypal_advanced_gateway_for_woocommerce();
