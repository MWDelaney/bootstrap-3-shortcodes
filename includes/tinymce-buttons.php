<?php
/* 

TinyMCE Buttons for Bootstrap Shortcodes 

*/

add_action( 'init', 'bs_shortcodes_buttons' );
function bs_shortcodes_buttons() {
    add_filter( "mce_external_plugins", "bs_shortcodes_add_buttons" );
    add_filter( 'mce_buttons_3', 'bs_shortcodes_register_buttons' );
}
function bs_shortcodes_add_buttons( $plugin_array ) {
    $plugin_array['bs_shortcodes'] = plugins_url( '/bootstrap-shortcodes/js/bootstrap-shortcodes-tinymce-buttons.js' );
    $plugin_array['bs_columns'] = plugins_url( '/bootstrap-shortcodes/js/bootstrap-shortcodes-tinymce-buttons.js' );

    return $plugin_array;
}
function bs_shortcodes_register_buttons( $buttons ) {
    array_push( $buttons, 
               'bootstrap_shortcodes_columns',              
               'bootstrap_shortcodes_button', 
               'bootstrap_shortcodes_alert', 
               'bootstrap_shortcodes_label',
               'bootstrap_shortcodes_badge',
               'bootstrap_shortcodes_icon',
               'bootstrap_shortcodes_panel'
              );
    return $buttons;
}
?>