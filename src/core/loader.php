<?php
namespace calisia_cod_restrict_address;



class loader{
    public static function load_js(){
        //include WC()->plugin_url() . '/includes/admin/class-wc-admin-assets.php';

        //include_once WC_ABSPATH . 'includes/admin/class-wc-admin.php';

        
        if( !(is_checkout() && ! ( is_wc_endpoint_url( 'order-pay' ) || is_wc_endpoint_url( 'order-received' )) )) {
            return;
        }


        wp_enqueue_script('calisia-cod-restrict-address-js', CALISIA_COD_RESTRICT_ADDRESS_URL . 'js/calisia-cod-restrict-address.js');

    }
}