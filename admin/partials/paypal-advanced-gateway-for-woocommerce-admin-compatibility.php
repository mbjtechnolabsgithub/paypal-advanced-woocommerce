<?php

/**
 * @class       PayPal_Advanced_Gateway_For_WooCommerce_Compatibility
 * @version	1.0.0
 * @package	paypal_advanced_gateway_for_woocommerce
 * @category	Class
 * @author      johnny manziel <phpwebcreators@gmail.com>
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class PayPal_Advanced_Gateway_For_WooCommerce_Compatibility {

    private static $version_2_1;

    public static function check_version() {


        if (defined('WC_VERSION') && WC_VERSION)
            $version = WC_VERSION;
        if (defined('WOOCOMMERCE_VERSION') && WOOCOMMERCE_VERSION)
            $version = WOOCOMMERCE_VERSION;

        self::$version_2_1 = version_compare($version, '2.0.20', '>');
    }

    /**
     * 
     * @param type $gateway_cls_name
     * @return type
     */
    public static function get_configuration_url($gateway_cls_name) {

        if (self::$version_2_1) {
            return admin_url('admin.php?page=wc-settings&tab=checkout&section=' . strtolower($gateway_cls_name));
        } else {
            return admin_url('admin.php?page=woocommerce_settings&tab=payment_gateways&section=' . $gateway_cls_name);
        }
    }

    /**
     * 
     * @param type $order
     * @return type
     */
    public static function get_order_total(&$order) {

        if (self::$version_2_1) {
            return $order->get_total();
        } else {
            return $order->get_order_total();
        }
    }

    /**
     * 
     * @param type $order
     * @return type
     */
    public static function get_shipping_total(&$order) {

        if (self::$version_2_1) {
            return $order->get_total_shipping();
        } else {
            return $order->get_shipping();
        }
    }

    /**
     * 
     * @global type $woocommerce
     * @param type $message
     * @param type $notice_type
     */
    public static function wc_add_notice($message, $notice_type = 'success') {

        if (self::$version_2_1) {
            wc_add_notice($message, $notice_type);
        } else {
            global $woocommerce;

            if ('error' == $notice_type) {
                $woocommerce->add_error($message);
            } else {
                $woocommerce->add_message($message);
            }
        }
    }

    /**
     * 
     * @global type $woocommerce
     */
    public static function wc_print_notices() {

        if (self::$version_2_1) {
            wc_print_notices();
        } else {
            global $woocommerce;
            $woocommerce->show_messages();
        }
    }

    /**
     * 
     * @global type $woocommerce
     * @return \WC_Logger
     */
    public static function new_wc_logger() {

        if (self::$version_2_1) {
            return new WC_Logger();
        } else {
            global $woocommerce;
            return $woocommerce->logger();
        }
    }

    /**
     * 
     * @global type $woocommerce
     */
    public static function set_messages() {

        if (self::$version_2_1) {
            
        } else {
            global $woocommerce;
            $woocommerce->set_messages();
        }
    }

    /**
     * 
     * @global type $woocommerce
     * @return type
     */
    public static function WC() {

        if (self::is_wc_version_gte_2_1()) {
            return WC();
        } else {
            global $woocommerce;
            return $woocommerce;
        }
    }

}

?>
