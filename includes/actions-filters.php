<?php

/*  This function filters the_content and adds id attributes to and should only trigger if
    the [scrollspy] shortcode is used on a page (filter called in bootstrap-shortcodes.php
    in the [scrollspy] shortcode function)
*/
function add_ids_to_header_tags( $content ) {

    $pattern = '#(?P<full_tag><(?P<tag_name>h\d)(?P<tag_extra>[^>]*)>(?P<tag_contents>[^<]*)</h\d>)#i';
    if ( preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER ) ) {
        $find = array();
        $replace = array();
        foreach( $matches as $match ) {
            if ( strlen( $match['tag_extra'] ) && false !== stripos( $match['tag_extra'], 'id=' ) ) {
                continue;
            }
            $find[]    = $match['full_tag'];
            $id        = sanitize_title( $match['tag_contents'] );
            $id_attr   = sprintf( ' id="%s"', $id );
            $replace[] = sprintf( '<%1$s%2$s%3$s>%4$s%5$s</%1$s>', $match['tag_name'], $match['tag_extra'], $id_attr, $match['tag_contents'], $extra );
        }
        $content = str_replace( $find, $replace, $content );
    }

    return $content;
}

/*  Include the styling for the help tab in the admin
*/
function bootstrap_shortcodes_help_styles() {
        wp_register_style( 'bootstrap-shortcodes-help', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help.css' ) );
        wp_enqueue_style( 'bootstrap-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_shortcodes_help_styles' );

add_filter('the_content', 'bs_fix_shortcodes');

//action to add a custom button to the content editor
function add_bootstrap_button() {
  
  //path to my icon
  $img = BS_SHORTCODES_URL . 'images/Twitter_Boostrap_logo.svg';
  
  //the id of the container I want to show in the popup
  $popup_url = 'bootstrap-shortcodes-help-popup';
  
  //our popup's title
  $title = 'Bootstrap Shortcodes Help';

  //append the icon
  $context = "<a title='{$title}'
    href='#TB_inline?width=640&height=650&inlineId={$popup_url}' class='thickbox button add_media' style='padding-left: 0px; padding-right: 0px;' title='Bootstrap Shortcodes Help'>
    <img src='{$img}' style='height: 20px; position: relative; top: -2px;'></a>";
  
  echo $context;
}
// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons', 'add_bootstrap_button', 11);

function boostrap_shortcodes_help() {
    include('bootstrap-shortcodes-help.php');
}
add_action( 'admin_footer', 'boostrap_shortcodes_help' );


?>
