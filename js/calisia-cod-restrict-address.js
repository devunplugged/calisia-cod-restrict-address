



class calisia_cod_restrict_address{

    constructor() {
        this.cod = document.getElementById("payment_method_cod");
        this.address = document.getElementById("ship-to-different-address-checkbox");
        this.payment_method = jQuery('form[name="checkout"] input[name="payment_method"]').val();
        this.error_seen = false;

        this.add_event_listeners();
    }

    add_event_listeners(){
        if(!this.cod_exists()){
            return false;
        }

        let self = this;

        jQuery(document).on('change', 'form[name="checkout"] input[name="payment_method"]', function() {
            self.payment_method = this.value;
            self.settings_check();
        });

        jQuery(document).on('change', '#ship-to-different-address-checkbox', function() {
            self.settings_check();
        });

        jQuery(document).on('click', '#place_order', function(event) {
            event.preventDefault();
            if(self.settings_ok()){
                jQuery("form[name='checkout']").submit();
            }else{
                self.show_error();
                self.scroll_to_error();
            }
        });

    }

    cod_exists(){
        if(!this.cod){
            return false;
        }
        return true;
    }

    settings_check(){
        if(this.settings_ok())
            return true;

        this.show_error();
        if(!this.error_seen){
            this.scroll_to_error();
        }
    }

    settings_ok(){    
        if(this.payment_method == 'cod' && this.address.checked){
            return false;
        }
        return true;
    }

    show_error(){
        jQuery(".woocommerce-notices-wrapper:last").html("<ul class='woocommerce-error'><li>"+calisia_cod_restrict_address_i18n.cod_with_different_shipping_address_error+"</li></ul>");
    }

    scroll_to_error(){
        let error_wrapper = jQuery(".woocommerce-error:last");
        jQuery('html, body').animate(
            {
                scrollTop: error_wrapper.offset().top - error_wrapper.height() - 25
            },
            250
        );
    }
}


jQuery( document ).ready(function() {
    new calisia_cod_restrict_address();
});
