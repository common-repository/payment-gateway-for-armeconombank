var $ = jQuery;
$(document).ready(function () {
    checkCheckboxes();
    $(document).on('change', '#woocommerce_hkd_armeconombank_testmode,#woocommerce_hkd_armeconombank_multi_currency,#woocommerce_hkd_armeconombank_save_card', function () {
        checkCheckboxes();
    });
    $(document).on('change', '#woocommerce_hkd_armeconombank_secondTypePayment', function () {
        if($(this).is(':checked')) {
            $('#woocommerce_hkd_armeconombank_successOrderStatus').val('processing').trigger('change').attr('disabled', 'disabled');
        }else{
            $('#woocommerce_hkd_armeconombank_successOrderStatus').prop('disabled', false);
        }
    });

    $(document).on('mouseover', '.wrap-armeconombank .woocommerce-help-tip', function () {
        let parentId = $(this).parent().attr('for');
        if (parentId === 'woocommerce_hkd_armeconombank_save_card_button_text') {
            $('#tiptip_content').css({
                'max-width': '300px',
                'width': '300px'
            }).html('<img src="'+ myScriptAEB.pluginsUrl + 'assets/images/bindingnew.jpg" width="300">');
        } else if(parentId === 'woocommerce_hkd_armeconombank_save_card_header') {
            $('#tiptip_content').css({
                'max-width': '300px',
                'width': '300px'
            }).html('<img src="'+ myScriptAEB.pluginsUrl + 'assets/images/payment.jpg" width="300">');
        }else if(parentId === 'woocommerce_hkd_armeconombank_save_card_use_new_card'){
            $('#tiptip_content').css({
                'max-width': '300px',
                'width': '300px'
            }).html('<img src="'+ myScriptAEB.pluginsUrl + 'assets/images/newcard.jpg" width="300">');
        }else{
            $('#tiptip_content').css({'max-width': '150px'});
        }
    });

    function checkCheckboxes() {
        $('.hiddenValueAEB').parents('tr').hide();
        let testMode = $('#woocommerce_hkd_armeconombank_testmode').is(':checked');
        let multiCurrency = $('#woocommerce_hkd_armeconombank_multi_currency').is(':checked');
        let bindingMode = $('#woocommerce_hkd_armeconombank_save_card').is(':checked');
        if(testMode){
            $('.testMode').parents('tr').show();
        }
        if(bindingMode){
            $('.bindingMode').parents('tr').show();
            $('.saveCardInfo').parents('tr').show();
        } else {
            $('.saveCardInfo').parents('tr').hide();
        }
        if (testMode && multiCurrency && bindingMode) {
            $('.testModeMultiCurrency').parents('tr').show();
            $('.bindingMultiCurrencyMode').parents('tr').show();
        } else if (multiCurrency && bindingMode) {
            $('.liveMultiCurrencyMode').parents('tr').show();
            $('.bindingMultiCurrencyMode').parents('tr').show();
        } else if(testMode && multiCurrency){
            $('.testModeMultiCurrency').parents('tr').show();
        } else if (multiCurrency) {
            $('.liveMultiCurrencyMode').parents('tr').show();
        }
    }
});
