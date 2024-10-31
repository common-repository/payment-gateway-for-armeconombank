<?php
/*
Plugin Name:Payment Gateway for ARMECONOMBANK
Plugin URI: #
Description: Pay with  ARMECONOMBANK payment system. Please note that the payment will be made in Armenian Dram.
Version: 1.0.5
Author: HK Digital Agency LLC
Author URI: https://hkdigital.am
License: GPLv2 or later
*/

/*
 *
 * Սույն հավելման(plugin) պարունակությունը պաշպանված է հեղինակային և հարակից իրավունքների մասին Հայաստանի Հանրապետության օրենսդրությամբ:
 * Արգելվում է պարունակության  վերարտադրումը, տարածումը, նկարազարդումը, հարմարեցումը և այլ ձևերով վերափոխումը,
 * ինչպես նաև այլ եղանակներով օգտագործումը, եթե մինչև նման օգտագործումը ձեռք չի բերվել ԷՅՋԿԱ ԴԻՋԻՏԱԼ ԷՋԵՆՍԻ ՍՊԸ-ի թույլտվությունը:
 *
 */

$currentPluginDomainAEB = 'wc-hkdigital-armeconombank-gateway';
$apiUrlAEB = 'https://plugins.hkdigital.am/api/';
$pluginDirUrlAEB = plugin_dir_url(__FILE__);
$pluginBaseNameAEB = dirname(plugin_basename(__FILE__));
if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
$pluginDataAEB = get_plugin_data(__FILE__);

/**
 *
 * @param $gateways
 * @return array
 */
function hkdAddAEBGatewayClass($gateways)
{
    $gateways[] = 'WC_HKD_ARMECONOMBANK_Gateway';
    return $gateways;
}
add_filter('woocommerce_payment_gateways', 'hkdAddAEBGatewayClass');



include dirname(__FILE__) . '/console/command.php';
include dirname(__FILE__) . '/includes/thankyou.php';

if (is_admin()) {
    include dirname(__FILE__) . '/includes/request.php';
    include dirname(__FILE__) . '/includes/language.php';
    include dirname(__FILE__) . '/includes/activate.php';
}

include dirname(__FILE__) . '/includes/errorCodes.php';
include dirname(__FILE__) . '/includes/main.php';


add_action('plugin_action_links_' . plugin_basename(__FILE__), 'hkd_armeconombank_gateway_setting_link');

function hkd_armeconombank_gateway_setting_link($links)
{
    $links = array_merge(array(
        '<a href="' . esc_url(admin_url('/admin.php')) . '?page=wc-settings&tab=checkout&section=hkd_armeconombank">' . __('Settings', 'wc-hkdigital-armeconombank-gateway') . '</a>'
    ), $links);
    return $links;
}
