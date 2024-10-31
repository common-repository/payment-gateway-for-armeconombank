<?php
if (isset($_POST['woocommerce_hkd_armeconombank_language_payment_aeb'])) {
    $language = $_POST['woocommerce_hkd_armeconombank_language_payment_aeb'];
    if ($language === 'hy' || $language === 'ru_RU' || $language === 'en_US')
        update_option('language_payment_aeb', $language);
}

