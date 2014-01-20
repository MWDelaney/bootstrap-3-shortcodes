<?php
function bootstrap_shortcodes_help_styles() {
	wp_register_style( 'bootstrap-shortcodes-help', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help.css' ) );
	wp_enqueue_style( 'bootstrap-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_shortcodes_help_styles' );

add_filter('the_content', 'bs_fix_shortcodes');

// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'add_bootstrap_button');

//action to add a custom button to the content editor
function add_bootstrap_button($context) {
  
  //path to my icon
  $img = BS_SHORTCODES_URL . 'images/Twitter_Boostrap_logo.svg';
  
  //the id of the container I want to show in the popup
  $popup_url = 'bootstrap-shortcodes-help-popup';
  
  //our popup's title
  $title = 'Bootstrap Shortcodes Help';

  //append the icon
  $context .= "<a title='{$title}'
    href='#TB_inline?inlineId={$popup_url}&width=640&height=550' class='thickbox button add_media' style='padding-left: 0px; padding-right: 0px;' title='Bootstrap Shortcodes Help'>
    <img src='{$img}' style='height: 20px; position: relative; top: -2px;'></a>";
  
  return $context;
}

function boostrap_shortcodes_help() {
    include('bootstrap-shortcodes-help.php');
}
add_action( 'admin_footer', 'boostrap_shortcodes_help' );


?>