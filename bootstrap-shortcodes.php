<?php
/*
Plugin Name: Bootstrap 3 Shortcodes
Plugin URI: http://wp-snippets.com/freebies/bootstrap-shortcodes or https://github.com/filipstefansson/bootstrap-shortcodes
Description: The plugin adds a shortcodes for all Bootstrap elements.
Version: 3.0.3.3
Author: Filip Stefansson, Simon Yeldon, and Michael W. Delaney
Author URI: 
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

function bootstrap_shortcodes_scripts()  { 

  // Bootstrap tooltip js
  wp_enqueue_script( 'bootstrap-shortcodes-tooltip', BS_SHORTCODES_URL . 'js/bootstrap-shortcodes-tooltip.js', array( 'jquery' ), false, true );
  
  // Bootstrap popover js
  wp_enqueue_script( 'bootstrap-shortcodes-popover', BS_SHORTCODES_URL . 'js/bootstrap-shortcodes-popover.js', array( 'jquery' ), false, true );

}
add_action( 'wp_enqueue_scripts', 'bootstrap_shortcodes_scripts', 9999 ); // Register this fxn and allow Wordpress to call it automatcally in the header

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
    add_shortcode('button-toolbar', array( $this, 'bs_button_toolbar' ));
    add_shortcode('caret', array( $this, 'bs_caret' ));
    add_shortcode('container', array( $this, 'bs_container' ));
    add_shortcode('dropdown', array( $this, 'bs_dropdown' ));
    add_shortcode('dropdown-item', array( $this, 'bs_dropdown_item' ));
    add_shortcode('nav', array( $this, 'bs_nav' ));
    add_shortcode('nav-item', array( $this, 'bs_nav_item' ));
    add_shortcode('divider', array( $this, 'bs_dropdown_divider' ));
    add_shortcode('alert', array( $this, 'bs_alert' ));
    add_shortcode('progress', array( $this, 'bs_progress' ));
    add_shortcode('progress-bar', array( $this, 'bs_progress_bar' ));
    add_shortcode('code', array( $this, 'bs_code' ));
    add_shortcode('span', array( $this, 'bs_span' ));
    add_shortcode('row', array( $this, 'bs_row' ));
    add_shortcode('column', array( $this, 'bs_column' ));
    add_shortcode('breadcrumb', array( $this, 'bs_breadcrumb' ));
    add_shortcode('breadcrumb-item', array( $this, 'bs_breadcrumb_item' ));
    add_shortcode('label', array( $this, 'bs_label' ));
    add_shortcode('list-group', array( $this, 'bs_list_group' ));
    add_shortcode('list-group-item', array( $this, 'bs_list_group_item' ));
    add_shortcode('list-group-item-heading', array( $this, 'bs_list_group_item_heading' ));
    add_shortcode('list-group-item-text', array( $this, 'bs_list_group_item_text' ));
    add_shortcode('badge', array( $this, 'bs_badge' ));
    add_shortcode('icon', array( $this, 'bs_icon' ));
    add_shortcode('icon_white', array( $this, 'bs_icon_white' ));
    add_shortcode('table', array( $this, 'bs_table' ));
    add_shortcode('table-wrap', array( $this, 'bs_table_wrap' ));
    add_shortcode('collapsibles', array( $this, 'bs_collapsibles' ));
    add_shortcode('collapse', array( $this, 'bs_collapse' ));
    add_shortcode('well', array( $this, 'bs_well' ));
    add_shortcode('tabs', array( $this, 'bs_tabs' ));
    add_shortcode('tab', array( $this, 'bs_tab' ));
    add_shortcode('tooltip', array( $this, 'bs_tooltip' ));
    add_shortcode('popover', array( $this, 'bs_popover' ));
    add_shortcode('panel', array( $this, 'bs_panel' ));
    add_shortcode('media', array( $this, 'bs_media' ));
    add_shortcode('media-object', array( $this, 'bs_media_object' ));
    add_shortcode('media-body', array( $this, 'bs_media_body' ));
    add_shortcode('jumbotron', array( $this, 'bs_jumbotron' ));
    add_shortcode('page-header', array( $this, 'bs_page_header' ));
    add_shortcode('lead', array( $this, 'bs_lead' ));
    add_shortcode('emphasis', array( $this, 'bs_emphasis' ));
    add_shortcode('img', array( $this, 'bs_img' ));
    add_shortcode('thumbnail', array( $this, 'bs_thumbnail' ));
    add_shortcode('responsive', array( $this, 'bs_responsive' ));
    add_shortcode('modal', array( $this, 'bs_modal' ));
    add_shortcode('modal-footer', array( $this, 'bs_modal_footer' ));

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
        "block" => false,
        "dropdown" => false,
        "link" => '',
        "target" => false,
        "xclass" => false,
        "title" => false,
        "data" => false
     ), $atts));
      if($data) { 
          $data = explode('|',$data);
          foreach($data as $d):
            $d = explode(',',$d);    
                $data_props .= 'data-'.$d[0]. '="'.trim($d[1]).'" ';
          endforeach;
      } else { $data_props = false; }
     $return  =  '<a href="' . $link . '" class="btn';
     $return .= ($type) ? ' btn-' . $type : ' btn-default';
     $return .= ($size) ? ' btn-' . $size : '';
     $return .= ($block) ? ' btn-block' : '';
     $return .= ($dropdown) ? ' dropdown-toggle' : '';
     $return .= ($xclass) ? ' ' . $xclass : '';
     $return .= '"';
     $return .= ($target) ? ' target="' . $target . '"' : '';
     $return .= ($title) ? ' title="' . $title . '"' : '';
     $return .= ($data_props) ? ' ' . $data_props : '';
     $return .= '>' . do_shortcode( $content ) . '</a>';

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
        "justified" => false,
        "dropup" => false
     ), $atts));
     $classes .= ($size) ? ' btn-group-' . $size : '';
     $classes .= ($vertical) ? ' btn-group-vertical' : '';
     $classes .= ($justified) ? ' btn-group-justified' : '';
     $classes .= ($dropup) ? ' dropup' : '';
     $return = '<div class="btn-group '.$classes.'">' . do_shortcode( $content ) . '</div>';
      return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_button_toolbar
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_button_toolbar( $atts, $content = null ) {
     $return = '<div class="btn-toolbar" role="toolbar">' . do_shortcode( $content ) . '</div>';
     return $return;
  }    
    
 /*--------------------------------------------------------------------------------------
    *
    * bs_caret
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_caret( $atts, $content = null ) {
    $return = '<span class="caret"></span>';
    return $return;
  }

 /*--------------------------------------------------------------------------------------
    *
    * bs_container
    *
    * @author Robin Wouters
    * @since 3.0.3.3
    *
    *-------------------------------------------------------------------------------------*/ 
  function bs_container( $atts, $content = null ) {
    $return = '<div class="container">' . do_shortcode( $content ) . '</div>';
    return $return;
  }  
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_dropdown
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_dropdown( $atts, $content = null ) {
     $return = '<ul class="dropdown-menu" role="menu">' . do_shortcode( $content ) . '</ul>';
     return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_dropdown_item
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_dropdown_item( $atts, $content = null ) {
     extract(shortcode_atts(array(
        "link" => false,
     ), $atts));
     $return = '<li><a href="'. $link .'">' . do_shortcode( $content ) . '</a></li>';
     return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_dropdown_divider
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_dropdown_divider( $atts, $content = null ) {
     $return = '<li class="divider">' . do_shortcode( $content ) . '</li>';
     return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_nav
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_nav( $atts, $content = null ) {
     extract(shortcode_atts(array(
        "type" => 'tabs',
        "stacked" => false,
        "justified" => false,
     ), $atts));
     $classes = 'nav nav-' . $type;
     $classes .= ($stacked) ? ' nav-stacked' : '';
     $classes .= ($justified) ? ' nav-justified' : '';
     $return = '<ul class="'.$classes.'">' . do_shortcode( $content ) . '</ul>';
     return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_nav_item
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_nav_item( $atts, $content = null ) {
     extract(shortcode_atts(array(
        "link" => false,
        "active" => false,
        "disabled" => false,
        "dropdown" => false,
     ), $atts));
     $return  =  '<li class="';
     $return .= ($dropdown) ? ' dropdown' : '';
     $return .= ($active) ? ' active' : '';
     $return .= ($disabled) ? ' disabled' : '';
     $return .= '"><a href="' . $link . '"';
     $return .= ($dropdown) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
     $return .= ($dropdown) ? '">' . str_replace("<ul", "</a><ul", do_shortcode( $content )) : '">' . do_shortcode( $content ) . '</a>';
     $return .= '</li>';
     return $return;
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
      "dismissable" => false
    ), $atts));
    $return  = '<div class="alert alert-' . $type;
    $return .= ($dismissable) ? ' alert-dismissable' : '';
    $return .= '">';
    $return .= ($dismissable) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';
    $return .= do_shortcode( $content ) . '</div>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_progress
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_progress($atts, $content = null) {
    extract(shortcode_atts(array(
      "striped" => false,
      "animated" => false,
    ), $atts));
    $return  =  '<div class="progress ';
    $return .= ($striped) ? 'progress-striped ' : '';
    $return .= ($animated) ? 'active' : '';
    $return .= '">' . do_shortcode( $content ) . '</div>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_progress_bar
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_progress_bar($atts, $content = null) {
    extract(shortcode_atts(array(
      "type" => false,
      "percent" => false,
    ), $atts));
    $return  =  '<div class="progress-bar ';
    $return .= ($type) ? ' progress-bar-' . $type : '';
    $return .= '" role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%">
                    <span class="sr-only">'. $percent .'% Complete</span>
                </div>';
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

    $return = '<div class="span' . $size . '">' . do_shortcode( $content ) . '</div>';
    return $return;
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
	 extract(shortcode_atts(array(
      "xclass" => false
    ), $atts));
    $return  =  '<div class="row';
    $return .= ($xclass) ? ' '.$xclass : '';
    $return .= '">' . do_shortcode( $content ) . '</div>';
    return $return;
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
      "offset_lg" => false,
      "offset_md" => false,
      "offset_sm" => false,
      "offset_xs" => false,
      "pull_lg" => false,
      "pull_md" => false,
      "pull_sm" => false,
      "pull_xs" => false,
      "push_lg" => false,
      "push_md" => false,
      "push_sm" => false,
      "push_xs" => false,
      "xclass" => false
    ), $atts));
    $return  =  '<div class="';
    $return .= ($lg) ? 'col-lg-' . $lg . ' ' : '';
    $return .= ($md) ? 'col-md-' . $md . ' ' : '';
    $return .= ($sm) ? 'col-sm-' . $sm . ' ' : '';
    $return .= ($xs) ? 'col-xs-' . $xs . ' ' : '';
    $return .= ($offset_lg) ? 'col-lg-offset-' . $offset_lg . ' ' : '';
    $return .= ($offset_md) ? 'col-md-offset-' . $offset_md . ' ' : '';
    $return .= ($offset_sm) ? 'col-sm-offset-' . $offset_sm . ' ' : '';
    $return .= ($offset_xs) ? 'col-xs-offset-' . $offset_xs . ' ' : '';
    $return .= ($pull_lg) ? 'col-lg-pull-' . $pull_lg . ' ' : '';
    $return .= ($pull_md) ? 'col-md-pull-' . $pull_md . ' ' : '';
    $return .= ($pull_sm) ? 'col-sm-pull-' . $pull_sm . ' ' : '';
    $return .= ($pull_xs) ? 'col-xs-pull-' . $pull_xs . ' ' : '';
    $return .= ($push_lg) ? 'col-lg-push-' . $push_lg . ' ' : '';
    $return .= ($push_md) ? 'col-md-push-' . $push_md . ' ' : '';
    $return .= ($push_sm) ? 'col-sm-push-' . $push_sm . ' ' : '';
    $return .= ($push_xs) ? 'col-xs-push-' . $push_xs . ' ' : '';
    $return .= ($xclass) ? $xclass : '';
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
    extract(shortcode_atts(array(
      "linked" => false,
    ), $atts));
    $return = ($linked) ? ' <div class="list-group">' : '<ul class="list-group">';
    $return .= do_shortcode( $content );
    $return .= ($linked) ? ' </div>' : '</ul>';
    return $return;

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group_item
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group_item( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "link" => false,
      "active" => false
    ), $atts));
    $return = ($link) ? '<a href="' . $link . '" ' : '<li ';
    $return .= 'class="list-group-item ';
    $return .= ($active) ? 'active' : '';
    $return .= '">' . do_shortcode( $content );
    $return .= ($link) ? '</a>' : '</li>';
    return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group_item_heading
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group_item_heading( $atts, $content = null ) {
    $return = '<h4 class="list-group-item-heading">' . do_shortcode( $content ) . '</h4>';
    return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_list_group_item_text
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_list_group_item_text( $atts, $content = null ) {
    $return = '<p class="list-group-item-text">' . do_shortcode( $content ) . '</p>';
    return $return;
  }


  /*--------------------------------------------------------------------------------------
    *
    * bs_breadcrumb
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_breadcrumb( $atts, $content = null ) {
    $return = '<ol class="breadcrumb">'.do_shortcode( $content ).'</ol>';
    return $return;
  }    

  /*--------------------------------------------------------------------------------------
    *
    * bs_breadcrumb_item
    *
    * @author M. W. Delaney
    *
    *-------------------------------------------------------------------------------------*/
  function bs_breadcrumb_item( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "link" => false,
    ), $atts));
    $return = '<li><a href="' . $link . '">'.do_shortcode( $content ).'</a></li>';
    return $return;
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

    $return = '<span class="label label-' . $type . '">' . do_shortcode( $content ) . '</span>';
    return $return;
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
    $return = '<span class="badge' . $right . '">' . do_shortcode( $content ) . '</span>';
    return $return;
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

    $return = '<span class="glyphicon glyphicon-' . $type . '"></span>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * simple_table
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------
  function bs_table( $atts ) {
      extract( shortcode_atts( array(
          'cols' => 'none',
          'data' => 'none',
          'bordered' => false,
          'striped' => false,
          'hover' => false,
          'condensed' => false,
      ), $atts ) );
      $cols = explode(',',$cols);
      $data = explode(',',$data);
      $total = count($cols);
      $return  = '<table class="table ';
      $return .= ($bordered) ? 'table-bordered ' : '';
      $return .= ($striped) ? 'table-striped ' : '';
      $return .= ($hover) ? 'table-hover ' : '';
      $return .= ($condensed) ? 'table-condensed ' : '';
      $return .='"><tr>';
      foreach($cols as $col):
          $return .= '<th>'.$col.'</th>';
      endforeach;
      $output .= '</tr><tr>';
      $counter = 1;
      foreach($data as $datum):
          $return .= '<td>'.$datum.'</td>';
          if($counter%$total==0):
              $return .= '</tr>';
          endif;
          $counter++;
      endforeach;
          $return .= '</table>';
      return $return;
  }
  */

  /*--------------------------------------------------------------------------------------
    *
    * bs_table_wrap
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_table_wrap( $atts, $content = null ) {
      extract( shortcode_atts( array(
          'bordered' => false,
          'striped' => false,
          'hover' => false,
          'condensed' => false,
      ), $atts ) );
    $classes  = 'table';
    $classes .= ($bordered) ? ' table-bordered' : '';
    $classes .= ($striped) ? ' table-striped' : '';
    $classes .= ($hover) ? ' table-hover' : '';
    $classes .= ($condensed) ? ' table-condensed' : '';    
    $dom = new DOMDocument;
    $dom->loadXML($content);
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);
    $return = $dom->saveXML();
    return $return;
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

    $return = '<div class="well' . $size . '">' . do_shortcode( $content ) . '</div>';
    return $return;
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
    $return = '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title">' . $title . '</h3></div><div class="panel-body">' . do_shortcode( $content ) . '</div>' . $footer . '</div>';
    return $return;
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

    $return = '';

    if( count($tab_titles) ){
      $return .= '<ul class="nav ' . $class . '" id="custom-tabs-'. rand(1, 100) .'">';

      $i = 0;
      foreach( $tab_titles as $tab ){
        if($i == 0)
          $return .= '<li class="active">';
        else
          $return .= '<li>';

        $return .= '<a href="#custom-tab-' . $GLOBALS['tabs_count'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
        $i++;
      }

        $return .= '</ul>';
        $return .= '<div class="tab-content">';
        $return .= do_shortcode( $content );
        $return .= '</div>';
    } else {
      $return .= do_shortcode( $content );
    }

    return $return;
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

    $return = '<div id="custom-tab-' . $GLOBALS['tabs_count'] . '-'. sanitize_title( $title ) .'" class="tab-pane ' . $state . '">'. do_shortcode( $content ) .'</div>';
    return $return;
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

    $return = '';

    if( count($tab_titles) ){
      $return .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
      $return .= do_shortcode( $content );
      $return .= '</div>';
    } else {
      $return .= do_shortcode( $content );
    }

    return $return;
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
      "type" => 'default',
      "active" => false
    ), $atts));

    if ($active)
      $active = 'in';

    $return = '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">' . $title . '</a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $active . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div></div>';
    return $return;
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
    $classes = 'bs-tooltip';    

    $dom = new DOMDocument;
    $dom->loadXML($content);
    if(!$dom->documentElement) {
        $element = $dom->createElement('span', $content);
        $dom->appendChild($element);
    }
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);
    $dom->documentElement->setAttribute('title', $title );
    if($animation) { $dom->documentElement->setAttribute('data-animation', $animation ); }
    if($placement) { $dom->documentElement->setAttribute('data-placement', $placement ); }
    if($html) { $dom->documentElement->setAttribute('data-html', $html ); }

    $return = $dom->saveXML();
    
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_popover
    *
    *
    *-------------------------------------------------------------------------------------*/

function bs_popover( $atts, $content = null ) {

    $defaults = array(
	   'title' => false,
       'text' => '',
	   'placement' => 'top',
	   'animation' => 'true',
	   'html' => 'false'
    );
    extract( shortcode_atts( $defaults, $atts ) );
    $classes = 'bs-popover';
    
    $dom = new DOMDocument;
    $dom->loadXML($content);
    if(!$dom->documentElement) {
        $element = $dom->createElement('span', $content);
        $dom->appendChild($element);
    }
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);
    $dom->documentElement->setAttribute('data-toggle', 'popover' );
    if($title) { $dom->documentElement->setAttribute('data-original-title', $title ); }
    $dom->documentElement->setAttribute('data-content', $text );
    if($animation) { $dom->documentElement->setAttribute('data-animation', $animation ); }
    if($placement) { $dom->documentElement->setAttribute('data-placement', $placement ); }
    if($html) { $dom->documentElement->setAttribute('data-html', $html ); }

    $return = $dom->saveXML();
    
    return $return;
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
    $return = '<div class="media">' . do_shortcode( $content ) . '</div>';
    return $return;
  }

function bs_media_object( $atts, $content = null ) {

    $defaults = array(
	   'pull' => "left",
    );
    extract( shortcode_atts( $defaults, $atts ) );
    
    $classes = "media-object";
    $dom = new DOMDocument;
    $dom->loadXML($content);
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);
    $return = $dom->saveXML();
    $return = '<span class="pull-'. $pull . '">' . $return . '</span>';
    return $return;
  }

function bs_media_body( $atts, $content = null ) {
    
    $defaults = array(
	   'title' => false,
    );
    extract( shortcode_atts( $defaults, $atts ) );
    $return .= '<div class="media-body">';
    $return .= ($title) ? '<h4 class="media-heading">' . $title . '</h4>' : '';
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

    $return .='<div class="jumbotron">';
    $return .= ($title) ? '<h1>' . $title . '</h1>' : '';
    $return .= do_shortcode( $content ) . '</div>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_page_header
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_page_header( $atts, $content = null ) {
    $classes = "page-header";
    $dom = new DOMDocument;
    $dom->loadXML($content);
    $hasHeader = $dom->getElementsByTagName('h1'); 

    if($hasHeader->length == 0) {
        
        $wrapper = $dom->createElement('div');
        $dom->appendChild($wrapper);
        
        $header = $dom->createElement('h1', $content);
        $wrapper->appendChild($header);

    }
    else {
        $new_root = $dom->createElement('div');
        $new_root->appendChild($dom->documentElement);
        $dom->appendChild($new_root);
    }
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);

    $return = $dom->saveXML();
    
    return $return;

  } 
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_lead
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_lead( $atts, $content = null ) {
    $return = '<p class="lead">' . do_shortcode( $content ) . '</p>';
    return $return;
  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_emphasis
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_emphasis( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'muted'
    ), $atts));
    $return = '<span class="text-' . $type . '">' . do_shortcode( $content ) . '</span>';
    return $return;
  }
  /*--------------------------------------------------------------------------------------
    *
    * bs_img
    *
    *
    *-------------------------------------------------------------------------------------*/
function bs_img( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => false,
      "responsive" => false,
    ), $atts));
    $classes .= ($type) ? 'img-' . $type . ' ' : '';
    $classes .= ($responsive) ? ' img-responsive' : '';   
    $dom = new DOMDocument;
    $dom->loadXML($content);
    foreach($dom->getElementsByTagName('img') as $image) { 
        $image->setAttribute('class', $image->getAttribute('class') . ' ' . $classes);
    } 
    $return = $dom->saveXML();
    
    return $return;

  }
    
  /*--------------------------------------------------------------------------------------
    *
    * bs_thumbnail
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_thumbnail( $atts, $content = null ) {
    $classes = "thumbnail";
    $dom = new DOMDocument;
    $dom->loadXML($content);
    if(!$dom->documentElement) {
        $element = $dom->createElement('div', $content);
        $dom->appendChild($element);
    }
    $dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . $classes);

    $return = $dom->saveXML();
    
    return $return;

  }
    
    /*--------------------------------------------------------------------------------------
    *
    * bs_responsive
    *
    *
    *-------------------------------------------------------------------------------------*/
  function bs_responsive( $atts, $content = null ) {
      extract( shortcode_atts( array(
          'visible' => '',
          'hidden' => '',
      ), $atts ) );
      if($visible) { 
          $visible = explode(' ',$visible);
          foreach($visible as $v):
            $classes .= 'visible-'.$v.' ';
          endforeach;
      }
      if($hidden) { 
          $hidden = explode(' ',$hidden);
          foreach($hidden as $h):
            $classes .= 'hidden-'.$h.' ';
          endforeach;
      }
      $return = '<span class="' . $classes . '">' . do_shortcode($content) . '</span>';
      return $return;

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_modal
    *
    * @author M. W. Delaney
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_modal( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "text" => '',
      "title" => '',
      "xclass" => ''
    ), $atts));
    $sani_title = 'modal'. sanitize_title( $title );
    $return .='<a data-toggle="modal" href="#'. $sani_title .'" class="'. $xclass .'">'. $text .'</a>';
    $return .='<div class="modal fade" id="'. $sani_title .'" tabindex="-1" role="dialog" aria-hidden="true">';
    $return .='<div class="modal-dialog">';
    $return .='<div class="modal-content">';
    $return .='<div class="modal-header">';
    $return .='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    $return .='<h4 class="modal-title">'. $title .'</h4>';
    $return .='</div>';
    $return .='<div class="modal-body">';
    $return .= do_shortcode($content);
    $return .='</div>';
    $return .='</div><!-- /.modal-content -->';
    $return .='</div><!-- /.modal-dialog -->';
    $return .='</div><!-- /.modal -->';  
    return $return;

  }

  /*--------------------------------------------------------------------------------------
    *
    * bs_modal_footer
    *
    * @author M. W. Delaney
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function bs_modal_footer( $atts, $content = null ) {
    $return = '<div class="modal-footer">' . do_shortcode( $content ) . '</div>';
    return $return;
  }

}

new BoostrapShortcodes();
