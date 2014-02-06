<?php
// Intelligently remove extra P and BR tags around shortcodes that WordPress likes to add
function bs_fix_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

/*  This function filters the_content and adds id attributes to and should only trigger if
    the [scrollspy] shortcode is used on a page (filter called in bootstrap-shortcodes.php
    in the [scrollspy] shortcode function)
*/
function bs_add_ids_to_header_tags( $content ) {

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

?>