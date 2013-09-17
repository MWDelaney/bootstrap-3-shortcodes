<?php
/*
Plugin Name: Bootstrap Shortcodes
Plugin URI: http://wp-snippets.com/freebies/bootstrap-shortcodes or https://github.com/filipstefansson/bootstrap-shortcodes
Description: The plugin adds a shortcodes for all Bootstrap elements.
Version: 1.0
Author: Filip Stefansson
Author URI: http://wp-snippets.com
Modified by: TwItCh AKA Dustin Crisman twitch@twitch.es
Modified URI: https://github.com/TwItChDW/bootstrap-shortcodes/
License: GPL2
*/

/*  Copyright 2012  Filipstefansson  (email : filip.stefansson@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* ============================================================= */

require_once(dirname(__FILE__) . '/includes/defaults.php');
require_once(dirname(__FILE__) . '/includes/functions.php');
require_once(dirname(__FILE__) . '/includes/actions-filters.php');

// Begin Shortcodes
class BoostrapShortcodes {

  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) );
  }


  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {

    add_shortcode('button', array( $this, 'bs_button' ));
    add_shortcode('button-group', array( $this, 'bs_button_group' ));
    add_shortcode('alert', array( $this, 'bs_alert' ));
    add_shortcode('code', array( $this, 'bs_code' ));
    add_shortcode('span', array( $this, 'bs_span' ));
    add_shortcode('row', array( $this, 'bs_row' ));
    add_shortcode('column', array( $this, 'bs_column' ));
    add_shortcode('label', array( $this, 'bs_label' ));
    add_shortcode('list-group', array( $this, 'bs_list_group' ));
    add_shortcode('list-group-item', array( $this, 'bs_list_group_item' ));
    add_shortcode('badge', array( $this, 'bs_badge' ));
    add_shortcode('icon', array( $this, 'bs_icon' ));
    add_shortcode('icon_white', array( $this, 'bs_icon_white' ));
    add_shortcode('table', array( $this, 'bs_table' ));
    add_shortcode('collapsibles', array( $this, 'bs_collapsibles' ));
    add_shortcode('collapse', array( $this, 'bs_collapse' ));
    add_shortcode('well', array( $this, 'bs_well' ));
    add_shortcode('tabs', array( $this, 'bs_tabs' ));
    add_shortcode('tab', array( $this, 'bs_tab' ));
    add_shortcode('tooltip', array( $this, 'bs_tooltip' ));
    add_shortcode('panel', array( $this, 'bs_panel' ));
    add_shortcode('media', array( $this, 'bs_media' ));
    add_shortcode('media-object', array( $this, 'bs_media_object' ));
    add_shortcode('media-body', array( $this, 'bs_media_body' ));
    add_shortcode('jumbotron', array( $this, 'bs_jumbotron' ));
    add_shortcode('lead', array( $this, 'bs_lead' ));
  }



  /*--------------------------------------------------------------------------------------
    *
    * bs_button
    *
    * @author Filip Stefansson
    * @since 1.0
    * //DW mod added xclass var
    *-------------------------------------------------------------------------------------*/
  function bs_button($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => false,
        "size" => false,
        "link" => '',
        "xclass" => false
     ), $atts));

     $return  =  '<a href="' . $link . '" class="btn';
     $return .= ($type) ? ' btn-' . $type : ' btn-default';
     $return .= ($size) ? ' btn-' . $size : '';
     $return .= ($xclass) ? ' ' . $xclass : '';
     $return .= '">' . do_shortcode( $content ) . '</a>';

     return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_button_group
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_button_group( $atts, $content = null ) {
     extract(shortcode_atts(array(
        "size" => false,
        "vertical" => false,
        "justified" => false
     ), $atts));
      if($size) {
        $classes .= ' btn-group-'.$size;
      }
       if($vertical) {
        $classes .= ' btn-group-vertical';
      } 
       if($justified) {
        $classes .= ' btn-group-justified';
      }
    return '<div class="button-group '.$classes.'">' . do_shortcode( $content ) . '</div>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_alert
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_alert($atts, $content = null) {
    extract(shortcode_atts(array(
      "type" => 'success',
      "strong" => false,
      "dismissable" => false
    ), $atts));
    $return  = '<div class="alert alert-' . $type;
    $return .= ($dismissable) ? ' alert-dismissable' : '';
    $return .= '">';
    $return .= ($dismissable) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';
    $return .= ($strong) ? '<strong>'.$strong.'</strong>' : '';
    $return .= do_shortcode( $content ) . '</div>';
    return $return;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_code
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_code($atts, $content = null) {
     extract(shortcode_atts(array(
        "inline" => false,
        "scrollable" => false
     ), $atts));
    if($inline) {
      $return = '<code>' . $content . '</code>';
    } else {
      $return  = '<pre';
      $return .= ($scrollable) ? ' class="pre-scrollable"': '';
      $return .= '>' . $content . '</pre>';
    }
    return $return;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_span
    *
    * @author Filip Stefansson
    * @since 1.0
    * @depricated Bootstrap 3 uses col-[xs|sm|md|lg]-[1-12]
    * @see bs_column
    *-------------------------------------------------------------------------------------*/
  function bs_span( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "size" => 'size'
    ), $atts));

    return '<div class="span' . $size . '">' . do_shortcode( $content ) . '</div>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_row
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_row( $atts, $content = null ) {

    return '<div class="row">' . do_shortcode( $content ) . '</div>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_column
    *
    * @author Simon Yeldon
    * @since 1.0
    * @todo pull and offset
    *-------------------------------------------------------------------------------------*/
  function bs_column( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "lg" => false,
      "md" => false,
      "sm" => false,
      "xs" => false,
      "offset-lg" => false,
      "offset-md" => false,
      "offset-sm" => false,
      "offset-xs" => false,
      "pull-lg" => false,
      "pull-md" => false,
      "pull-sm" => false,
      "pull-xs" => false,
      "push-lg" => false,
      "push-md" => false,
      "push-sm" => false,
      "push-xs" => false,
    ), $atts));
    $return  =  '<div class="';
    $return .= ($lg) ? 'col-lg-' . $lg . ' ' : '';
    $return .= ($md) ? 'col-md-' . $md . ' ' : '';
    $return .= ($sm) ? 'col-sm-' . $sm . ' ' : '';
    $return .= ($xs) ? 'col-xs-' . $xs . ' ' : '';
    $return .= ($offset-lg) ? 'col-lg-offset-' . $offset-lg . ' ' : '';
    $return .= ($offset-md) ? 'col-md-offset-' . $offset-md . ' ' : '';
    $return .= ($offset-sm) ? 'col-sm-offset-' . $offset-sm . ' ' : '';
    $return .= ($offset-xs) ? 'col-xs-offset-' . $offset-xs . ' ' : '';
    $return .= ($pull-lg) ? 'col-lg-pull-' . $pull-lg . ' ' : '';
    $return .= ($pull-md) ? 'col-md-pull-' . $pull-md . ' ' : '';
    $return .= ($pull-sm) ? 'col-sm-pull-' . $pull-sm . ' ' : '';
    $return .= ($pull-xs) ? 'col-xs-pull-' . $pull-xs . ' ' : '';
    $return .= ($push-lg) ? 'col-lg-push-' . $push-lg . ' ' : '';
    $return .= ($push-md) ? 'col-md-push-' . $push-md . ' ' : '';
    $return .= ($push-sm) ? 'col-sm-push-' . $push-sm . ' ' : '';
    $return .= ($push-xs) ? 'col-xs-push-' . $push-xs . ' ' : '';
    $return .= '">' . do_shortcode( $content ) . '</div>';

    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group( $atts, $content = null ) {

    return '<ul class="list-group">' . do_shortcode( $content ) . '</ul>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group_item
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group_item( $atts, $content = null ) {

    return '<li class="list-group-item">' . do_shortcode( $content ) . '</li>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_label
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'default'
    ), $atts));

    return '<span class="label label-' . $type . '">' . do_shortcode( $content ) . '</span>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_badge
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_badge( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "right" => false
    ), $atts));
    $right = ($right) ? " pull-right" : "";
    return '<span class="badge' . $right . '">' . do_shortcode( $content ) . '</span>';

  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_icon
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_icon( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type',
    ), $atts));

    return '<span class="glyphicon glyphicon-' . $type . '"></span>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * simple_table
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_table( $atts ) {
      extract( shortcode_atts( array(
          'cols' => 'none',
          'data' => 'none',
          'type' => 'type'
      ), $atts ) );
      $cols = explode(',',$cols);
      $data = explode(',',$data);
      $total = count($cols);
      $output = '';
      $output .= '<table class="table table-'. $type .' table-bordered"><tr>';
      foreach($cols as $col):
          $output .= '<th>'.$col.'</th>';
      endforeach;
      $output .= '</tr><tr>';
      $counter = 1;
      foreach($data as $datum):
          $output .= '<td>'.$datum.'</td>';
          if($counter%$total==0):
              $output .= '</tr>';
          endif;
          $counter++;
      endforeach;
          $output .= '</table>';
      return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_well
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    * Options:
    *   size: sm = small, lg = large
    *
    *-------------------------------------------------------------------------------------*/
    function bs_well( $atts, $content = null ) {
      extract(shortcode_atts(array(
        "size" => false
      ), $atts));

      if($size) {
        $size = ' well-'.$size;
      }

      return '<div class="well' . $size . '">' . do_shortcode( $content ) . '</div>';
    }

  /*--------------------------------------------------------------------------------------
    *
    * bs_panel
    *
    * @author M. W. Delaney
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_panel( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "title" => '',
      "type" => 'default',
      "footer" => false
    ), $atts));
    if($footer) {
        $footer = '<div class="panel-footer">' . $footer . '</div>';
      }
    return '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title">' . $title . '</h3></div><div class="panel-body">' . do_shortcode( $content ) . '</div>' . $footer . '</div>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_tabs
    *
    * @author Filip Stefansson
    * @since 1.0
    * Modified by TwItCh twitch@designweapon.com
    * Now acts a whole nav/tab/pill shortcode solution!
    *-------------------------------------------------------------------------------------*/
  function bs_tabs( $atts, $content = null ) {

    if( isset($GLOBALS['tabs_count']) )
      $GLOBALS['tabs_count']++;
    else
      $GLOBALS['tabs_count'] = 0;

    $defaults = array('class' => 'nav-tabs');
    extract( shortcode_atts( $defaults, $atts ) );


    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

    $output = '';

    if( count($tab_titles) ){
      $output .= '<ul class="nav ' . $class . '" id="custom-tabs-'. rand(1, 100) .'">';

      $i = 0;
      foreach( $tab_titles as $tab ){
        if($i == 0)
          $output .= '<li class="active">';
        else
          $output .= '<li>';

        $output .= '<a href="#custom-tab-' . $GLOBALS['tabs_count'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
        $i++;
      }

        $output .= '</ul>';
        $output .= '<div class="tab-content">';
        $output .= do_shortcode( $content );
        $output .= '</div>';
    } else {
      $output .= do_shortcode( $content );
    }

    return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_tab
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_tab( $atts, $content = null ) {

    if( !isset($GLOBALS['current_tabs']) ) {
      $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
      $state = 'active';
    } else {

      if( $GLOBALS['current_tabs'] == $GLOBALS['tabs_count'] ) {
        $state = '';
      } else {
        $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
        $state = 'active';
      }
    }

    $defaults = array( 'title' => 'Tab');
    extract( shortcode_atts( $defaults, $atts ) );

    return '<div id="custom-tab-' . $GLOBALS['tabs_count'] . '-'. sanitize_title( $title ) .'" class="tab-pane ' . $state . '">'. do_shortcode( $content ) .'</div>';
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_collapsibles
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_collapsibles( $atts, $content = null ) {

    if( isset($GLOBALS['collapsibles_count']) )
      $GLOBALS['collapsibles_count']++;
    else
      $GLOBALS['collapsibles_count'] = 0;

    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

    $output = '';

    if( count($tab_titles) ){
      $output .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
      $output .= do_shortcode( $content );
      $output .= '</div>';
    } else {
      $output .= do_shortcode( $content );
    }

    return $output;
  }




  /*--------------------------------------------------------------------------------------
    *
    * bs_collapse
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_collapse( $atts, $content = null ) {

    if( !isset($GLOBALS['current_collapse']) )
      $GLOBALS['current_collapse'] = 0;
    else
      $GLOBALS['current_collapse']++;

    extract(shortcode_atts(array(
      "title" => '',
      "state" => false
    ), $atts));

    if ($state == "active")
      $state = 'in';

    return '<div class="panel"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">' . $title . '</a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $state . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div></div>';
  }


  /*--------------------------------------------------------------------------------------
    *
    * bs_tooltip
    *
    * @author
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/

function bs_tooltip( $atts, $content = null ) {

    $defaults = array(
	   'title' => '',
	   'placement' => 'top',
	   'animation' => 'true',
	   'html' => 'false'
    );
    extract( shortcode_atts( $defaults, $atts ) );

    wp_enqueue_script( 'bootsrap-shortcodes-tooltip', BS_SHORTCODES_URL . 'js/bootstrap-shortcodes-tooltip.js', array( 'jquery' ), false, true );

    return '<a href="#" class="bs-tooltip" data-toggle="tooltip" title="' . $title . '" data-placement="' . $placement . '" data-animation="' . $animation . '" data-html="' . $html . '">' . $content . '</a>';
  }


  /*--------------------------------------------------------------------------------------
    *
    * bs_media
    *
    * @author
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
    
function bs_media( $atts, $content = null ) {
    
    $defaults = array(
	   'title' => false,
    );
    extract( shortcode_atts( $defaults, $atts ) );
    return '<div class="media">' . do_shortcode( $content ) . '</div>';
  }

function bs_media_object( $atts, $content = null ) {

    $defaults = array(
	   'pull' => "left",
    );
    extract( shortcode_atts( $defaults, $atts ) );
    
    $classes = "media-object";
    if ( preg_match('/<img.*? class=".*?" \/>/', $content) ) { 
         $return = preg_replace('/(<img.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $content); 
    } 
    else { 
         $return = preg_replace('/(<img.*?)>/', '$1 class="' . $classes . '" >', $content);
    }
    $return = '<span class="pull-'. $pull . '">' . $return . '</span>';
    return $return;
  }

function bs_media_body( $atts, $content = null ) {
    
    $defaults = array(
	   'title' => false,
    );
    extract( shortcode_atts( $defaults, $atts ) );
    $return .= '<div class="meda-body">';
    if($title) {
        $return .= '<h4 class="media-heading">' . $title . '</h4>';
    }
    $return .= $content . '</div>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_jumbotron
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_jumbotron( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "title" => false
    ), $atts));

    return '<div class="jumbotron"><h1>' . $title . '</h1>' . do_shortcode( $content ) . '</div>';

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_lead
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_lead( $atts, $content = null ) {
    return '<p class="lead">' . do_shortcode( $content ) . '</p>';

  }

}

new BoostrapShortcodes();
