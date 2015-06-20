<?php

/**
 * @class       PayPal_Advanced_Gateway_For_WooCommerce_Admin
 * @version	1.0.0
 * @package	paypal_advanced_gateway_for_woocommerce
 * @category	Class
 * @author      johnny manziel <phpwebcreators@gmail.com>
 */

class PayPal_Advanced_Gateway_For_WooCommerce_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the Dashboard.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PayPal_Advanced_Gateway_For_WooCommerce_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The PayPal_Advanced_Gateway_For_WooCommerce_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/paypal-advanced-gateway-for-woocommerce-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the dashboard.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PayPal_Advanced_Gateway_For_WooCommerce_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The PayPal_Advanced_Gateway_For_WooCommerce_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/paypal-advanced-gateway-for-woocommerce-admin.js', array('wp-color-picker'), $this->version, false);
    }

    public function load_plugin_extend_lib() {
        if (!class_exists('WC_Payment_Gateway'))
            return;

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/paypal-advanced-gateway-for-woocommerce-admin-display.php';
       
    }

    public function paypal_advanced_gateway_for_woocommerce_add_gateway($methods) {
        $methods[] = 'PayPal_Advanced_Gateway_For_WooCommerce_Admin_Display';
        return $methods;
    }
    
    public function paypal_advanced_gateway_for_woocommerce_standard_parameters($paypal_args) {
        if( isset($paypal_args['BUTTONSOURCE']) ) {
            $paypal_args['BUTTONSOURCE'] = 'mbjtechnolabs_SP';
        } else {
            $paypal_args['bn'] = 'mbjtechnolabs_SP';
        }
        return $paypal_args;
    }

}
