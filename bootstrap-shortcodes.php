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
    add_shortcode('alert', array( $this, 'bs_alert' ));
    add_shortcode('code', array( $this, 'bs_code' ));
    add_shortcode('span', array( $this, 'bs_span' ));
    add_shortcode('row', array( $this, 'bs_row' ));
    add_shortcode('label', array( $this, 'bs_label' ));
    add_shortcode('badge', array( $this, 'bs_badge' ));
    add_shortcode('icon', array( $this, 'bs_icon' ));
    add_shortcode('icon_white', array( $this, 'bs_icon_white' ));
    add_shortcode('table', array( $this, 'bs_table' ));
    add_shortcode('collapsibles', array( $this, 'bs_collapsibles' ));
    add_shortcode('collapse', array( $this, 'bs_collapse' ));
    add_shortcode('well', array( $this, 'bs_well' ));
    add_shortcode('tabs', array( $this, 'bs_tabs' ));
    add_shortcode('tab', array( $this, 'bs_tab' ));

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
     $return .= ($type) ? ' btn-' . $type : '';
     $return .= ($size) ? ' btn-' . $size : '';
     $return .= ($xclass) ? ' ' . $xclass : '';
     $return .= '">' . do_shortcode( $content ) . '</a>';

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
        "type" => '',
        "close" => true
     ), $atts));
     return '<div class="alert alert-' . $type . '">' . do_shortcode( $content ) . '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
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
        "type" => '',
        "size" => '',
        "link" => ''
     ), $atts));
     return '<pre><code>' . do_shortcode( $content ) . '</code></pre>';
  }
  



  /*--------------------------------------------------------------------------------------
    *
    * bs_span
    *
    * @author Filip Stefansson
    * @since 1.0
    * 
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
    
    return '<div class="row-fluid">' . do_shortcode( $content ) . '</div>';

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
      "type" => 'type'
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
      "type" => 'type'
    ), $atts));

    return '<span class="badge badge-' . $type . '">' . do_shortcode( $content ) . '</span>';

  }
  



  /*--------------------------------------------------------------------------------------
    *
    * bs_icon
    *
    * @author Filip Stefansson
    * @since 1.0
    *  //DW Mod to add icon sizing
    *-------------------------------------------------------------------------------------*/
  function bs_icon( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type',
      "size" => 'normal',
    ), $atts));

    return '<i class="icon icon-' . $type . ' icon-' . $size .'"></i>'; 

  }
  



  /*--------------------------------------------------------------------------------------
    *
    * bs_icon_white
    *
    * @author Filip Stefansson
    * @since 1.0
    * 
    *-------------------------------------------------------------------------------------*/
  function bs_icon_white( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => 'type'
    ), $atts));

    return '<i class="icon icon-' . $type . ' icon-white"></i>';

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
    *-------------------------------------------------------------------------------------*/
    function bs_well( $atts, $content = null ) {
      extract(shortcode_atts(array(
        "size" => 'size'
      ), $atts));

      return '<div class="well well-' . $size . '">' . do_shortcode( $content ) . '</div>';
    }
  


  /*--------------------------------------------------------------------------------------
    *
    * bs_tabs
    *
    * @author Filip Stefansson
    * @since 1.0
    * Modified by TwItCh twitch@designweapon.com
    *Now acts a whole nav/tab/pill shortcode solution!
    *-------------------------------------------------------------------------------------*/
  function bs_tabs( $atts, $content = null ) {
    
    if( isset($GLOBALS['tabs_count']) )
      $GLOBALS['tabs_count']++;
    else
      $GLOBALS['tabs_count'] = 0;
    extract( shortcode_atts( array(
    'tabtype' => 'nav-tabs',
    'tabdirection' => '',
  ), $atts ) );
   //DW $defaults = array('tabtype' => 'bla', 'tabdirection' => 'one');
   //DW extract( shortcode_atts( $defaults, array(), $atts ) );
    
    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
    
    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
    
    $output = '';
    
    if( count($tab_titles) ){
      $output .= '<div class="tabbable tabs-'.$tabdirection.'"><ul class="nav '. $tabtype .'" id="custom-tabs-'. rand(1, 100) .'">';
      
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
        $output .= '</div></div>';
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
      $output .= '<div class="accordion" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
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


    $defaults = array( 'title' => 'Tab', 'state' => '');
    extract( shortcode_atts( $defaults, $atts ) );
    
    if (!empty($state)) 
      $state = 'in';

    return '
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">
          ' . $title . ' 
        </a>
      </div>
      <div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="accordion-body collapse ' . $state . '">
        <div class="accordion-inner">
          ' . $content . ' 
        </div>
      </div>
    </div>
    ';
  }

}

new BoostrapShortcodes()

?>
