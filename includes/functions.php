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

// We need to be able to figure out the attributes of a wrapped shortcode
function bs_attribute_map($str, $att = null) {
    $res = array();
    $return = array();
    $reg = get_shortcode_regex();
    preg_match_all('~'.$reg.'~',$str, $matches);
    foreach($matches[2] as $key => $name) {
        $parsed = shortcode_parse_atts($matches[3][$key]);
        $parsed = is_array($parsed) ? $parsed : array();

            $res[$name] = $parsed;
            $return[] = $res;
        }
    return $return;
}

?>