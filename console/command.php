<?php

// Add 30 minute cron job

/**
 * Remove the specified resource from storage.
 *
 * @param $schedules
 * @return array
 */
function cronSchedulesForAEB($schedules)
{
    if (!isset($schedules["30min"])) {
        $schedules["30min"] = array(
            'interval' => 30 * 60,
            'display' => __('Once every 30 minutes'));
    }
    return $schedules;
}
add_filter('cron_schedules', 'cronSchedulesForAEB');

function initHKDAEBPlugin()
{
    if (!wp_next_scheduled('cronCheckOrderArmeconombank')) {
        wp_schedule_event(time(), '30min', 'cronCheckOrderArmeconombank');
    }
    add_rewrite_endpoint('cards', EP_PERMALINK | EP_PAGES, 'cards');
    flush_rewrite_rules();
}
add_action('init', 'initHKDAEBPlugin');