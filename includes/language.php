<?php

$overrideLocaleAEB = !empty(get_option('language_payment_aeb')) ? get_option('language_payment_aeb') : 'hy';
add_filter('plugin_locale','changeLanguageAEB', 10, 2);

/**
 * change location event
 *
 * @param $locale
 * @param $domain
 * @return string
 */
function changeLanguageAEB($locale, $domain)
{
    global $currentPluginDomainAEB;
    global $overrideLocaleAEB;
    if ($domain == $currentPluginDomainAEB) {
        $locale = $overrideLocaleAEB;
    }
    return $locale;
}