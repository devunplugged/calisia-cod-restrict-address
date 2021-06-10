<?php
namespace calisia_cod_restrict_address;



class checkout{
    public static function check_order($posted) {
        if($posted['payment_method'] == 'cod' && $posted['ship_to_different_address'] == 1)
            wc_add_notice( __( 'We cannot sand your items to other shipping address when using "cod" payment method. Please change payment method or use billing address instead.', 'calisia-cod-restrict-address' ), 'error');
    
        return;
    }

    public static function js_checkout_msgs(){
        echo "
        <script>
            let calisia_cod_restrict_address_i18n = {
                'cod_with_different_shipping_address_error' : '".__( 'We cannot sand your items to other shipping address when using "cod" payment method. Please change payment method or use billing address instead.', 'calisia-cod-restrict-address' )."'
            };
        </script>
        ";
    }
}