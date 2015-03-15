<?php

/*  Include the styling for the help tab in the admin
*/

function bootstrap_shortcodes_styles_all() {
    wp_register_style( 'bootstrap-shortcodes-help-all', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help-all.css' ) );
    wp_enqueue_style( 'bootstrap-shortcodes-help-all' );
}

add_action( 'admin_enqueue_scripts', 'bootstrap_shortcodes_styles_all' );

function bootstrap_shortcodes_help_styles() {
        wp_register_style( 'bs-font', plugins_url( 'bootstrap-3-shortcodes/includes/help/bs-font.css' ) );
        wp_register_style( 'bootstrap-shortcodes-help', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help.css' ) );
        wp_register_style( 'bootstrap-modal', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-modal.css' ) );
        wp_register_script( 'bootstrap', plugins_url( 'bootstrap-3-shortcodes/includes/help/js/bootstrap.min.js' ) );
        wp_enqueue_style( 'bootstrap-shortcodes-help' );
        wp_enqueue_style( 'bootstrap-modal' );
        wp_enqueue_style( 'bs-font' );
        wp_enqueue_script( 'bootstrap' );
    
        //Visual Composer causes problems
        $handle = 'vc_bootstrap_js';
        $list = 'enqueued';
         if (wp_script_is( $handle, $list )) {
             wp_dequeue_script( $handle );
         }
}

add_filter('the_content', 'bs_fix_shortcodes');

//action to add a custom button to the content editor
function add_bootstrap_button() {
        //the id of the container I want to show in the popup
        $popup_id = 'bootstrap-shortcodes-help';

        //our popup's title
        $title = 'Bootstrap Shortcodes Help';

        //append the icon
        printf(
        '<a data-toggle="modal" data-target="#bootstrap-shortcodes-help" title="%2$s" href="%3$s" class="%4$s"><span class="bs_bootstrap-logo wp-media-buttons-icon"></span></a>',
        esc_attr( $popup_id ),
        esc_attr( $title ),
        esc_url( '#' ),
        esc_attr( 'button add_media bootstrap-shortcodes-button')
        //sprintf( '<img src="%s" style="height: 20px; position: relative; top: -2px;">', esc_url( $img ) )
        );
}


// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
if(in_array(basename($_SERVER['PHP_SELF']), array('post.php', 'page.php', 'page-new.php', 'post-new.php', 'widgets.php'))) {
    add_action('media_buttons', 'add_bootstrap_button', 11);
    add_action( 'media_buttons', 'bootstrap_shortcodes_help_styles' );
}
function boostrap_shortcodes_help() {
    include('bootstrap-shortcodes-help.php');
}
add_action( 'admin_footer', 'boostrap_shortcodes_help' );

// Add the Bootstrap Shortcodes button to Distraction Free Writing mode 
function bs_fullscreenbuttons($buttons) {
	
	$buttons[] = 'separator';
	
	$buttons['bootstrap-shortcodes'] = array(
		'title' => __('Boostrap 3 Shortcodes Help'),
		'onclick' => "jQuery('#bootstrap-shortcodes-help').modal('show');",
		'both' => false 
	);
	
	return $buttons;
}
add_action ('wp_fullscreen_buttons', 'bs_fullscreenbuttons');

add_filter("gform_noconflict_styles", "bs_register_script");
function bs_register_script($scripts){

    //registering my script with Gravity Forms so that it gets enqueued when running on no-conflict mode
    $scripts[] = "bootstrap-shortcodes-help-all";
    return $scripts;
}
