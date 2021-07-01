<?php
namespace calisia_cod_restrict_address;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class translations{
    /**
     * Load plugin textdomain.
     */
    public static function load_textdomain() {
        load_plugin_textdomain( 'calisia-cod-restrict-address', false, 'calisia-cod-restrict-address/languages' );
    }

    
}