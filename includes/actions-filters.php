<?php

/*  Include the styling for the help tab in the admin
*/

function bootstrap_shortcodes_help_styles() {
  wp_register_style( 'bs-font', plugins_url( 'bootstrap-3-shortcodes/includes/help/bs-font.css' ) );
  wp_enqueue_style( 'bs-font' );
  wp_register_style( 'bootstrap-shortcodes-help', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help.css' ) );
  wp_enqueue_style( 'bootstrap-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_shortcodes_help_styles' );

add_filter('the_content', 'bs_fix_shortcodes');

//action to add a custom button to the content editor
function add_bootstrap_button() {
  
  //the id of the container I want to show in the popup
  $popup_id = 'bootstrap-shortcodes-help-popup';
  
  //our popup's title
  $title = 'Bootstrap Shortcodes Help';

  //append the icon
  printf(
    '<a title="%1$s" href="%2$s" class="thickbox button add_media bootstrap-shortcodes-button" style="padding-left: 0px; padding-right: 0px;"><span class="bs_bootstrap-logo wp-media-buttons-icon"></span></a>',
    esc_attr( $title ),
    esc_url( '#TB_inline?width=640&height=650&inlineId=' . $popup_id )
    //sprintf( '<img src="%s" style="height: 20px; position: relative; top: -2px;">', esc_url( $img ) )
  );
}

// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons', 'add_bootstrap_button', 11);

function boostrap_shortcodes_help() {
    include('bootstrap-shortcodes-help.php');
}
add_action( 'admin_footer', 'boostrap_shortcodes_help' );
