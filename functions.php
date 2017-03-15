<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// Hook in checkout fields
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    // Removals
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_phone']);

    // Overrides
    $fields['billing']['billing_email']['class'] = array('form-row-wide');
    $fields['billing']['billing_email']['placeholder'] = 'user@example.com';


    return $fields;
}
